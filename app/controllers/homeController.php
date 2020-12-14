<?php

class homeController extends Controller{

	public function index()
	{
		$data['title'] = 'Mật độ dân số vùng Tây Nguyên';
		$data['province'] = $this->model('Province')->getAll();
		$data['district'] = $this->model('District')->getAll();
		$data['commune'] = $this->model('Commune')->getAll();
		$data['time'] = $this->model('Population')->getTime();

		$this->view('home/index', $data);
	}
}