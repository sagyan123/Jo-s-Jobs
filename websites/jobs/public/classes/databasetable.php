<?php
class DatabaseTable
{
	public $table;
	public function __construct($table)
	{
		$this->table = $table;
	}
	function save($record, $pk = '')
	{
		try {
			$this->insert($record);
		} catch (Exception $e) {
			$this->update($record, $pk);
		}
	}
	function insert($record)
	{
		global $pdo;
		$keys = array_keys($record);
		$keysWC = implode(', ', $keys);
		$keysWCAC = implode(', :', $keys);
		$query = "INSERT INTO $this->table($keysWC) VALUES(:$keysWCAC)";
		$stmt = $pdo->prepare($query);
		$stmt->execute($record);
	}
	function update($record, $pk)
	{
		global $pdo;
		$para = [];
		foreach ($record as $key => $value) {
			$para[] = $key . ' = :' . $key;
		}
		$paraList = implode(', ', $para);
		$query = "UPDATE $this->table SET $paraList WHERE $pk = :pk";
		$record['pk'] = $record[$pk];
		$stmt = $pdo->prepare($query);
		$stmt->execute($record);
	}
	function find($field, $value)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM $this->table WHERE $field = :value");
		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);
		return $stmt;
	}
	function findBycategory($value)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM job WHERE categoryId = :value");
		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);
		return $stmt;
	}

	function orderByDate()
	{
		global $pdo;
		$stmt = $pdo->prepare("select * from  $this->table order by closingDate limit 10");
		// $criteria = [
		//         'value' => $value
		// ];
		$stmt->execute();
		return $stmt;
	}


	function findByLocation($value)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM job WHERE location = :value");
		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);
		return $stmt;
	}
	function findAll()
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM $this->table");
		$stmt->execute();
		return $stmt;
	}
	function delete($field, $value)
	{
		global $pdo;
		$stmt = $pdo->prepare("DELETE FROM $this->table WHERE $field = :value");
		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);
		return $stmt;
	}


	function count($field, $value)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT count(*) as count FROM $this->table  WHERE $field  = :value");

		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);
		return $stmt;
	}

	function bi($value, $date)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM job WHERE categoryId = $value AND closingDate > :date");
		$date = new DateTime();
		$criteria = [

			'date' => $date->format('Y-m-d')
		];

		$stmt->execute($criteria);
		return $stmt;
	}

	function user($username)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");

		$crietria = [
			'username' => $username
		];
		$stmt->execute($crietria);
		return $stmt;
	}




	function CAlo($value, $location, $date)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM job WHERE categoryId = $value AND location = :location AND closingDate > :date");
		$date = new DateTime();
		$criteria = [
			'location' => $location,
			'date' => $date->format('Y-m-d')
		];

		$stmt->execute($criteria);
		return $stmt;
	}
	function distinct($value)
	{
		global $pdo;
		$stmt = $pdo->query("SELECT DISTINCT(location) FROM $this->table where categoryId = $value ");

		return $stmt;
	}
}