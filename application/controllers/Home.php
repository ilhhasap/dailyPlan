<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Task_model");
    }
	
	public function index()
	{
        $data['judul'] = "Home";
        $data['active'] = "home";

		$data['showAllStatus'] = $this->Task_model->showAllStatus();
		$data['showAllPriority'] = $this->Task_model->showAllPriority();
		$data['showAllTaskToday'] = $this->Task_model->showAllTaskToday();
		$data['showAllTask'] = $this->Task_model->showAllTask();
		
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer', $data);
	}
	
}