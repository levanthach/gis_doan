<?php

class homeController extends Controller{

	public function index()
	{
		$data['title'] = 'Mật độ dân số vùng Tây Nguyên';
		// $data['nama'] = $this->model('User')->getUser();

		// $this->view('templates/header', $data);
		$this->view('home/index');
		//$this->view('templates/footer');
	}
}