<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 07.07.2019
 * Time: 12:23
 */

namespace common\models;


class PhotoResizer
{



    public static function resize($src,$width = 1280, $height = 800)
    {

        /* Get original file size */
        if (!file_exists($src) OR (filesize($src) == 0)) {

        return false;
        }
        list($w, $h) = getimagesize($src);
        $params = getimagesize($src);
        $mimetype = $params['mime'];

        // D::dump(getimagesize($scr));


        /*$ratio = $w / $h;
        $size = $width;

        $width = $height = min($size, max($w, $h));

        if ($ratio < 1) {
            $width = $height * $ratio;
        } else {
            $height = $width / $ratio;
        }*/

        /* Calculate new image size */
        $ratio = max($width / $w, $height / $h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* set new file name */
        $path = $src;


        /* Save image */
        if ($mimetype == 'image/jpeg') {
            /* Get binary data from image */
            $imgString = file_get_contents($src);
            /* create image from string */
            $image = imagecreatefromstring($imgString);
            $tmp = imagecreatetruecolor($width, $height);
            imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
            imagejpeg($tmp, $path, 70);
        } else if ($mimetype == 'image/png') {
            $image = imagecreatefrompng($src);
            $tmp = imagecreatetruecolor($width, $height);
            imagealphablending($tmp, false);
            imagesavealpha($tmp, true);
            imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
            imagepng($tmp, $path, 0);
        } else if ($mimetype == 'image/gif') {
            $image = imagecreatefromgif($src);

            $tmp = imagecreatetruecolor($width, $height);
            $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
            imagefill($tmp, 0, 0, $transparent);
            imagealphablending($tmp, true);

            imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $w, $h);
            imagegif($tmp, $path);
        } else {
            //  D::success("MIMETYPE  = ".$mimetype);
            return false;
        }


        imagedestroy($image);
        imagedestroy($tmp);

        return true;
    }


}