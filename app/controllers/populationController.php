<?php

class populationController extends Controller {

	public function index()
	{		
		$data['title'] = 'Dân số';
        $data['district'] = $this->model('Population')->getAllCommune();
		$data['population'] = $this->model('Population')->getAll();

		$this->view('templates/header', $data);
		$this->view('population/index', $data);
		$this->view('templates/footer');
	}

	public function create()
	{
        $data['commune'] = $this->model('Population')->getAllCommune();
        $this->view('templates/header', $data);
        $this->view('templates/footer');
		$this->view('population/create', $data);
	}

	public function store()
	{
        $name  = $_POST['name'];
        $district_id  = $_POST['district_id'];
        $acreage  = $_POST['acreage'];
        
        $this->model('Population')->store($name, $district_id, $acreage);
		$this->redirect('population');
	}

	public function edit($id)
	{
		$data['title'] = 'Sửa xã phường';
        $data['commune'] = $this->model('Population')->getAllCommune();
		$data['population'] = $this->model('Population')->edit($id);

		$this->view('templates/header', $data);
        $this->view('population/edit', $data);
        $this->view('templates/footer');
	}

	public function update($id, $name, $commune_id, $acreage)
	{
        $name  = $_POST['name'];
        $commune_id  = $_POST['district_id'];
        $acreage = $_POST['acreage'];

		$this->model('Population')->update($id, $name, $commune_id, $acreage);

		$this->redirect('population');
	}

	public function destroy($id)
	{
		$this->model('Population')->destroy($id);

		$this->redirect('population');
	}
}