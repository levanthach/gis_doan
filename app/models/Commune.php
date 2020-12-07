<?php

class Commune {

    private $db;
    private $table = 'commune';
    private $table_district = 'district';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
    }
    
    public function getAllDistrict()
	{
        $this->db->query("SELECT * FROM {$this->table_district}");
		return $this->db->resultSet();
	}

	public function store($name, $district_id, $acreage)
	{

		$this->db->query("INSERT INTO {$this->table} (name, district_id, acreage) VALUES (:name, :district_id , :acreage)");
		
        $this->db->bind(':name', $name);
        $this->db->bind(':district_id', $district_id);
        $this->db->bind(':acreage', $acreage);

		return $this->db->execute();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id, $name, $district_id, $acreage)
	{
        $this->db->query("UPDATE {$this->table} SET name = :name, district_id = :district_id, acreage = :acreage WHERE id = {$id}");

        $this->db->bind(':name', $name);

        $this->db->bind(':district_id', $district_id);

        $this->db->bind(':acreage', $acreage);
    
		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}

}