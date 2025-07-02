<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use App\Models\Car;
use App\Models\CarImage;

class ImageUploadController extends Controller
{
    public function create(Car $car)
    {
        $car->load(["images"]);

        return inertia(
            "Seller/CarImage/Create",
            ["car" => $car]
        );
    }

    public function store(Request $request, Car $car)
    {
        if ($request->hasFile("images")) {
            $request->validate(
                ["images.*" => "mimes:jpg, png, jpeg | max:6000"],
                ["images.*.mimes" => ".jpg, .png & .jpeg only"]
            );

            $cloudinary = new Cloudinary(env("CLOUDINARY_URL"));
            foreach ($request->file("images") as $file) {
                $uploadResult = $cloudinary->uploadApi()->upload(
                    $file->getRealPath(),
                    [
                        'transformation' => [
                            [
                                'width' => 800,
                                'height' => 600,
                                'crop' => 'fill',
                                'gravity' => 'auto'
                            ]
                        ]
                    ]
                );
                $uploadedFileUrl = $uploadResult['secure_url'] ?? null;

                $car->images()->save(new CarImage(["file_url" => $uploadedFileUrl]));
            }
            return redirect()->back()->with("success", "image uploaded!");
        }
    }

    public function destroy(Car $car, CarImage $image)
    {
        $url = $image->file_url;
        $parts = explode('/', parse_url($url, PHP_URL_PATH));
        $versionIndex = array_search('upload', $parts) + 1;
        $publicIdParts = array_slice($parts, $versionIndex + 1);
        $publicIdWithExt = implode('/', $publicIdParts);
        $publicId = preg_replace('/\.[^.]+$/', '', $publicIdWithExt);

        $cloudinary = new Cloudinary(env("CLOUDINARY_URL"));
        $cloudinary->uploadApi()->destroy($publicId);
        $image->delete();

        return redirect()->back()->with("success", "image deleted!");
    }
}
