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


	public function newSql($sql, $params = []) {
		return $this->db->query($sql, $params);
	}


	public function insert(array $fields) {
		if (is_assoc($fields)) {
			$q_values = '';
			$q_fields = '';

			foreach ($fields as $field => $val) {
				$q_fields .= "`$field`,";
				$q_values .= is_numeric($val) ? $val . ',' : "'$val',";
			}
			$q_values = rtrim($q_values, ',');
			$q_fields = rtrim($q_fields, ',');
			$sql = "INSERT INTO `{$this->table}` ({$q_fields}) VALUES ({$q_values})";		
			return $this->db->execute($sql);

		}
		return false;
	}

}
