<html lang="HTML5">

<head>
    <title>PHP Quick Start</title>
</head>

<body>
    <?php

    require __DIR__ . '/vendor/autoload.php';

    // Use the Configuration class 
    use Cloudinary\Configuration\Configuration;
    // Use the Resize transformation group and the ImageTag class
    use Cloudinary\Transformation\Resize;
    use Cloudinary\Transformation\Background;
    use Cloudinary\Tag\ImageTag;

    // Configure an instance of your Cloudinary cloud
    Configuration::instance("cloudinary://" . env("CLOUDINARY_API_KEY") . ":" . env("CLOUDINARY_API_SECRET") . "@" . env("CLOUDINARY_CLOUD_NAME") . "?secure=true");

    // Create the image tag with the transformed image
    $imgtag = (new ImageTag('d97fg4aoolyolinjvbs0'))
        ->resize(
            Resize::pad()
                ->width(100)
                ->height(100)
                ->background(Background::predominant())
        );

    echo $imgtag;
// The code above generates an HTML image tag similar to the following:
//  <img src="https://res.cloudinary.com/demo/image/upload/b_auto:predominant,c_pad,h_400,w_400/flower_sample">
