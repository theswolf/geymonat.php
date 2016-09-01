<?php

/**
 * Created by PhpStorm.
 * User: christian
 * Date: 31/08/16
 * Time: 15.57
 */
class RandomImage
{
    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
    }

    public function randomImage() {
        $this->CI->load->helper('directory');
        $folder = './static/randomimages/';
        $map = directory_map($folder);

        $fileIndex = array_rand($map);
        $file = $folder.$map[$fileIndex];
        //var_dump($file);
        return $file;
    }

}