<html lang="HTML5">

<body>
    <?php

    require __DIR__ . '/vendor/autoload.php';

    // Use the Configuration class 
    use Cloudinary\Configuration\Configuration;

    // Configure an instance of your Cloudinary cloud
    Configuration::instance(env(("CLOUDINARY_URL")));

    // Use the UploadApi class for uploading assets
    use Cloudinary\Api\Upload\UploadApi;

    // Upload the image
    $upload = new UploadApi();
    echo '<pre>';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
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
        } catch (Exception $e) {
            echo 'Upload failed: ' . $e->getMessage();
        }
    }
