<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //just make sure they cant access this file directly

require ('fpdf/fpdf.php');

class Myfpdf extends FPDF{
    function __construct (){
        parent::__construct();
        $CI =& get_instance();
    }
        
}

?>
