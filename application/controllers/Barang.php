<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
    }
	
	public function index()
	{
        $data['judul'] = "List Barang";
		$data['showAllBarang'] = $this->Barang_model->showAllBarang();
		$this->load->view('Barang/index', $data);
	}

	public function simpanBarang()
	{
		$this->Barang_model->simpanBarang();
		$this->session->set_flashdata('message', ' ditambahkan!');

		redirect(base_url('Barang'));
	}
	public function hapusBarang($kodeBarang)
	{
		$this->Barang_model->hapusBarang($kodeBarang);
		$this->session->set_flashdata('message', ' dihapus!');

		redirect(base_url('Barang'));
	}
}