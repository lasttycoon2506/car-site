<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use App\Models\Car;


class ImageUploadController extends Controller
{
    public function create(Car $car)
    {
        return inertia(
            "Seller/CarImage/Create",
            ["car" => $car]
        );
    }

    public function store(Request $request)
    {
        if ($request->hasFile("images")) {
            $cloudinary = new Cloudinary(env("CLOUDINARY_URL"));
            foreach ($request->file("images") as $file) {
                $uploadResult = $cloudinary->uploadApi()->upload($file->getRealPath());
                $uploadedFileUrl = $uploadResult['secure_url'] ?? null;
            }
        }
    }
}
