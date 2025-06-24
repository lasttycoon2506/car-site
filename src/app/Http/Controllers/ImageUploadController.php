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
        // Configure an instance of your Cloudinary cloud
        // Configuration::instance(env("CLOUDINARY_URL"));

        // Use the UploadApi class for uploading assets
        // $upload = new UploadApi();
        // echo '<pre>';
        // if ($request->isMethod('post') && $request->hasFile('image')) {
        //     $file = $request->file('image')->getRealPath();
        //     try {
        //         echo json_encode(
        //             $upload->upload($file, [
        //                 'public_id' => 'flower_sample',
        //                 'use_filename' => true,
        //                 'overwrite' => true
        //             ]),
        //             JSON_PRETTY_PRINT
        //         );
        //         echo '</pre>';
        //     } catch (\Exception $e) {
        //         echo 'Upload failed: ' . $e->getMessage();
        //     }
        // }
        // $request->validate([
        //     'image' => 'required|image|max:5120', // 5MB max
        // ]);
        // // Upload to Cloudinary
        // $cloudinary = new Cloudinary(env("CLOUDINARY_URL"));
        // $uploadResult = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath());
        // $uploadedFileUrl = $uploadResult['secure_url'] ?? null;

        // return response()->json(['url' => $uploadedFileUrl]);
        if ($request->hasFile("images")) {
            $cloudinary = new Cloudinary(env("CLOUDINARY_URL"));
            foreach ($request->file("images") as $file) {
                $uploadResult = $cloudinary->uploadApi()->upload($file->getRealPath());
                $uploadedFileUrl = $uploadResult['secure_url'] ?? null;
            }
        }
        dd($request);
    }
}
