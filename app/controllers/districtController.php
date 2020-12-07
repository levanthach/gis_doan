<?php

class districtController extends Controller {

	public function index()
	{		
		$data['title'] = 'Danh sách các quận huyện vùng Tây Nguyên';
        $data['province'] = $this->model('District')->getAllProvince();
		$data['district'] = $this->model('District')->getAll();

		$this->view('templates/header', $data);
		$this->view('district/index', $data);
		$this->view('templates/footer');
	}

	public function create()
	{
        $data['province'] = $this->model('District')->getAllProvince();
		$data['title'] = 'Thêm quận, huyện';
        $this->view('templates/header', $data);
        $this->view('templates/footer');
		$this->view('district/create', $data);
	}

	public function store()
	{
        $name  = $_POST['name'];
		$province_id  = $_POST['province_id'];
        
        $this->model('District')->store($name, $province_id);
		$this->redirect('district');
	}

	public function edit($id)
	{
		$data['title'] = 'Sửa quận huyện';
        $data['province'] = $this->model('District')->getAllProvince();
		$data['district'] = $this->model('District')->edit($id);

		$this->view('templates/header', $data);
        $this->view('district/edit', $data);
        $this->view('templates/footer');
	}

	public function update($id, $name, $province_id)
	{
        $name  = $_POST['name'];
        $province_id  = $_POST['province_id'];

		$this->model('District')->update($id, $name, $province_id);

		$this->redirect('district');
	}

	public function destroy($id)
	{
		$this->model('District')->destroy($id);

		$this->redirect('district');
	}



}