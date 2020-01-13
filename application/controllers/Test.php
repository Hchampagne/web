<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
        public function _contruct() {
                parent::__contruct();
            
            }

	public function test1()
	{
                $this->load->view('head');
                $this->load->view('header');
                $this->load->view('test');
                $this->load->view('footer');
	}

        

        // travail dans la branche test ok
}