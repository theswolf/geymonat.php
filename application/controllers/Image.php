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

        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        $this->output->set_header('Content-Type:image/jpg');
        $this->output->set_header('Content-Length: ' . strlen(bin2hex($file))/2);
        //$this->output->set_output(imagejpeg($file, null, 100));

        $this->output->set_output($file);

    }
}