<html lang="HTML5">

<head>
    <title>PHP Quick Start</title>
</head>

<body>
    <?php

    require __DIR__ . '/vendor/autoload.php';

    // Use the Configuration class 
    use Cloudinary\Configuration\Configuration;

    // Configure an instance of your Cloudinary cloud
    Configuration::instance("cloudinary://" . env("CLOUDINARY_API_KEY") . ":" . env("CLOUDINARY_API_SECRET") . "@" . env("CLOUDINARY_CLOUD_NAME") . "?secure=true");
