<?php

class provinceController extends Controller {

	public function index()
	{		
		$data['title'] = 'Danh sách các tỉnh Tây Nguyên';

		$data['province'] = $this->model('Province')->getAll();

		$this->view('templates/header', $data);
		$this->view('province/index', $data);
		$this->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = 'Thêm tỉnh';
        $this->view('templates/header', $data);
        $this->view('templates/footer');
		$this->view('province/create');
	}

	public function store()
	{
		$name  = $_POST['name'];

		$this->model('Province')->store($name);
		$this->redirect('province');
	}

	public function edit($id)
	{
		$data['title'] = 'Sửa tỉnh';

		$data['province'] = $this->model('Province')->edit($id);

		$this->view('templates/header', $data);
        $this->view('province/edit', $data);
        $this->view('templates/footer');
	}

	public function update($id)
	{
		$name  = $_POST['name'];

		$this->model('Province')->update($id, $name);

		$this->redirect('province');
	}

	public function destroy($id)
	{
		$this->model('Province')->destroy($id);

		$this->redirect('province');
	}



}