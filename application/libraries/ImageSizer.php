<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: christian
 * Date: 31/08/16
 * Time: 15.39
 */
class ImageSizer
{
    function imageResizer($filename)
    {

        //header('Content-type: image/jpeg');

        list($width_orig, $height_orig, $type) = getimagesize($filename);

        $ratio_orig = $width_orig / $height_orig;
        $width = 1440;

        $height = $width / $ratio_orig;



        // This resamples the image
        $image_p = imagecreatetruecolor($width, $height);

        $allowedTypes = array(
            1,  // [] gif
            2,  // [] jpg
            3,  // [] png
            6   // [] bmp
        );

        switch ($type) {
            case 1 :
                $im = imageCreateFromGif($filename);
                break;
            case 2 :
                $im = imageCreateFromJpeg($filename);
                break;
            case 3 :
                $im = imageCreateFromPng($filename);
                break;
            case 6 :
                $im = imageCreateFromBmp($filename);
                break;
        }


        //$image = imagecreatefromjpeg($url);
        imagecopyresampled($image_p, $im, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        // Output the image
       //eturn imagejpeg($image_p, null, 100);
        ob_start();
        imagepng($image_p);
        $file_contents = ob_get_contents();
        ob_end_clean();
        return $file_contents;

    }



// makes the process simpler
public function serveimage($filename)
{
    return $this->imageResizer($filename);
}
}