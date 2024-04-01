<?php
    namespace App\Controllers;
    class Session extends BaseController{

        public $session=null;
	    public function __construct(){
		    $this->session= \Config\Services::session();
	    }
        public function exit(){
            $this->session->destroy();
            return view('welcome_message');
            exit();
        }
    }
?>