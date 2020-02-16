<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("CutiModel");
		$this->load->model("IzinModel");
	}

	public function index()
	{
		$data['cuti'] = $this->CutiModel->tampil();
		$data['cutisel'] = $this->CutiModel->countCuti('disetujui');
		$data['cutikonfir'] = $this->CutiModel->konfirCuti('belum');

		$data['izinsel'] = $this->IzinModel->countIzin('disetujui');
		$data['izinkonfir'] = $this->IzinModel->konfirIzin('belum');
		// $data['sakit'] = $this->CutiModel->countCuti('Cuti Sakit');
		// $data['melahirkan'] = $this->CutiModel->countCuti('Cuti Melahirkan');
		// $data['alasan'] = $this->CutiModel->countCuti('Cuti Karena Alasan Penting');
		// $data['tanggungan'] = $this->CutiModel->countCuti('Cuti Cuti di Luar Tanggungan Negara');

		// var_dump($data['besar']);exit();

		$this->load->view('templates/header');
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');
	}
}
