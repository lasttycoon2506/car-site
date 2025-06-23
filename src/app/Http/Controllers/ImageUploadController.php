<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;


class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Configure an instance of your Cloudinary cloud
        Configuration::instance(env("CLOUDINARY_URL"));

        // Use the UploadApi class for uploading assets
        $upload = new UploadApi();
        echo '<pre>';
        if ($request->isMethod('post') && $request->hasFile('image')) {
            $file = $request->file('image')->getRealPath();
            try {
                echo json_encode(
                    $upload->upload($file, [
                        'public_id' => 'flower_sample',
                        'use_filename' => true,
                        'overwrite' => true
                    ]),
                    JSON_PRETTY_PRINT
                );
                echo '</pre>';
            } catch (\Exception $e) {
                echo 'Upload failed: ' . $e->getMessage();
            }
        }
    }
}
