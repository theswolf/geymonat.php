<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: christian
 * Date: 01/09/16
 * Time: 10.30
 */
class Image  extends CI_Controller
{
    public function index() {

        $this->load->library(array('randomImage', 'imageSizer'));


        $file = $this->imagesizer->serveimage($this->randomimage->randomImage());

        $this->output->set_header('Content-Type:image/jpg');
        //$this->output->set_header('Content-Length: ' . filesize($file));
        //$this->output->set_output(imagejpeg($file, null, 100));

        $this->output->set_output($file);

    }
}