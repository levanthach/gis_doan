<?php

class Population {

    private $db;
    private $table = 'population';
    private $table_commune = 'commune';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
    }
    
    public function getAllCommune()
	{
        $this->db->query("SELECT * FROM {$this->table_commune}");
		return $this->db->resultSet();
	}

	public function store($name, $commune_id, $time, $count)
	{
		$this->db->query("INSERT INTO {$this->table} (name, commune_id, time, count) VALUES (:name, :commune_id , :time, :count)");
		
        $this->db->bind(':name', $name);
        $this->db->bind(':commune_id', $commune_id);
        $this->db->bind(':time', $time);
        $this->db->bind(':count', $count);

		return $this->db->execute();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id, $name, $commune_id, $time, $count)
	{
        $this->db->query("UPDATE {$this->table} SET name = :name, commune_id = :commune_id, time = :time, count= :count WHERE id = {$id}");

        $this->db->bind(':name', $name);

        $this->db->bind(':commune_id', $commune_id);

        $this->db->bind(':time', $time);

        $this->db->bind(':count', $count);
    
		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}

}