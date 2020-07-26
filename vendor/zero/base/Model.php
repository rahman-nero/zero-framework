<?php 

namespace Zero\base;
use Zero\Db;

/**
 * 
 */
abstract class Model
{
	public $table = 'asdasd';
	protected $db;

	public function __construct()
	{
	 	$this->db = Db::instance();		
	}

	public function findOne($where = null) {
		if ($where) {
			$sql = "SELECT * FROM {$this->table} WHERE {$where} LIMIT 1";
		} else {
			$sql = "SELECT * FROM {$this->table} LIMIT 1";
		}
		return $this->db->query($sql);
	}

	public function findAll($where = null) {
		if ($where) {
			$sql = "SELECT * FROM {$this->table} WHERE {$where}";
		} else {
			$sql = "SELECT * FROM {$this->table}";
		}
		return $this->db->query($sql);
	}
}
