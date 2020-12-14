<?php

class District {

    private $db;
    private $table = 'district';
    private $table_province = 'province';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
    }
    
    public function getAllProvince()
	{
        $this->db->query("SELECT * FROM {$this->table_province}");
		return $this->db->resultSet();
	}

	public function getDistrictsByProvince($province_id)
	{
        $this->db->query("SELECT * FROM {$this->table_province} WHERE province_id = {$province_id}");
		return $this->db->resultSet();
	}

	public function store($name, $province_id)
	{
		$this->db->query("INSERT INTO {$this->table} (name, province_id) VALUES (:name, :province_id)");
		
        $this->db->bind(':name', $name);
        $this->db->bind(':province_id', $province_id);

		return $this->db->execute();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id, $name, $province_id)
	{
        $this->db->query("UPDATE {$this->table} SET name = :name, province_id = :province_id WHERE id = {$id}");

        $this->db->bind(':name', $name);

        $this->db->bind(':province_id', $province_id);
    
		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}

}