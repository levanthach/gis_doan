<?php

class communeController extends Controller {

	public function index()
	{		
		$data['title'] = 'Danh sách các xã phường vùng Tây Nguyên';
        $data['district'] = $this->model('Commune')->getAllDistrict();
		$data['commune'] = $this->model('Commune')->getAll();

		$this->view('templates/header', $data);
		$this->view('commune/index', $data);
		$this->view('templates/footer');
	}

	public function create()
	{
        $data['district'] = $this->model('Commune')->getAllDistrict();
		$data['title'] = 'Thêm xã phường';
        $this->view('templates/header', $data);
        $this->view('templates/footer');
		$this->view('commune/create', $data);
	}

	public function store()
	{
        $name  = $_POST['name'];
        $district_id  = $_POST['district_id'];
        $acreage  = $_POST['acreage'];

        $this->model('Commune')->store($name, $district_id, $acreage);
		$this->redirect('commune');
	}

	public function edit($id)
	{
		$data['title'] = 'Sửa xã phường';
        $data['district'] = $this->model('Commune')->getAllDistrict();
		$data['commune'] = $this->model('Commune')->edit($id);

		$this->view('templates/header', $data);
        $this->view('commune/edit', $data);
        $this->view('templates/footer');
	}

	public function update($id, $name, $district_id, $acreage)
	{
        $name  = $_POST['name'];
        $district_id  = $_POST['district_id'];
        $acreage  = $_POST['acreage'];

		$this->model('Commune')->update($id, $name, $district_id, $acreage);

		$this->redirect('commune');
	}

	public function destroy($id)
	{
		$this->model('Commune')->destroy($id);

		$this->redirect('commune');
	}

}