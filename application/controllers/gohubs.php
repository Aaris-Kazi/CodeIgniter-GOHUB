<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gohubs extends CI_Controller{
    public function index(){
        // $conn = 'mysql:host=localhost;dbname=static_pages';
        // $this->load->database($conn);
        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('index');
    }
    public function login(){
        $this->load->database();
        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('login');
    }
    public function logout(){
        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('logout');
    }
    public function register(){
        $this->load->database();
        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('register');
    }
    public function search(){
        $this->load->database();
        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('search');
    }
}

?>