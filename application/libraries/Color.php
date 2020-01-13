<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color {

    private $CI;

    function __construct() {
        $this->CI =& get_instance();
    }
}
        
     function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
        
     function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    }

