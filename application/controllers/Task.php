<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Task_model");
		// Status :
		// 1 . Pending
		// 2 . Not Started
		// 3 . In Progress
		// 4 . Completed
    }
	
	public function completed()
	{
        $data['judul'] = "Completed Task";
        $data['active'] = "completed";

		$data['showAllTask'] = $this->Task_model->showAllTask();
		$data['showAllStatus'] = $this->Task_model->showAllStatus();
		$data['showAllPriority'] = $this->Task_model->showAllPriority();
		$data['showAllTaskByStatus'] = $this->Task_model->showAllTaskByStatus(4);
		$this->load->view('templates/header', $data);
		$this->load->view('status/completed', $data);
		$this->load->view('templates/footer', $data);
	}

	public function inProgress()
	{
        $data['judul'] = "In Progress Task";
        $data['active'] = "inProgress";

		$data['showAllTask'] = $this->Task_model->showAllTask();
		$data['showAllStatus'] = $this->Task_model->showAllStatus();
		$data['showAllPriority'] = $this->Task_model->showAllPriority();
		$data['showAllTaskByStatus'] = $this->Task_model->showAllTaskByStatus(3);
		$this->load->view('templates/header', $data);
		$this->load->view('status/inProgress', $data);
		$this->load->view('templates/footer', $data);
	}

	public function notStarted()
	{
        $data['judul'] = "Not Started Task";
        $data['active'] = "notStarted";

		$data['showAllTask'] = $this->Task_model->showAllTask();
		$data['showAllStatus'] = $this->Task_model->showAllStatus();
		$data['showAllPriority'] = $this->Task_model->showAllPriority();
		$data['showAllTaskByStatus'] = $this->Task_model->showAllTaskByStatus(2);
		$this->load->view('templates/header', $data);
		$this->load->view('status/notStarted', $data);
		$this->load->view('templates/footer', $data);
	}
    
	public function pending()
	{
        $data['judul'] = "Pending Task";
        $data['active'] = "pending";

		$data['showAllTask'] = $this->Task_model->showAllTask();
		$data['showAllStatus'] = $this->Task_model->showAllStatus();
		$data['showAllPriority'] = $this->Task_model->showAllPriority();
		$data['showAllTaskByStatus'] = $this->Task_model->showAllTaskByStatus(1);
		$this->load->view('templates/header', $data);
		$this->load->view('status/pending', $data);
		$this->load->view('templates/footer', $data);
	}

    public function addTask()
	{
		$this->Task_model->addTask();
		$this->session->set_flashdata('message', ' dihapus!');

		redirect(base_url('Home'));
	}
	
    public function editTask()
	{
		$this->Task_model->editTask($this->input->post());
		$this->session->set_flashdata('message', ' dihapus!');

		redirect(base_url('Home'));
	}
	
    public function deleteTask($idTask)
	{
		$this->Task_model->deleteTask($idTask);
		$this->session->set_flashdata('message', ' dihapus!');

		redirect(base_url('Home'));
	}
	
}