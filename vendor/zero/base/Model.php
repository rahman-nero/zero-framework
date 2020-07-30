<?php 

namespace Zero\base;
use Zero\Db;

/**
 * 
 */
abstract class Model
{
	protected $table; // таблица с котором мы работаем
	protected $db; // объект Db - соединения с бд  - там 
	protected $routes; // поля которые разрешаются заполнять - в бд


	public function __construct()
	{
	 	$this->db = Db::instance();		
	}

	// Выводить одну запись, WHERE разрешается
	public function findOne($where = null) {
		if ($where) {
			$where = preg_replace("#WHERE#i", '', $where); // Удаляем лишний знак 
			$sql = "SELECT * FROM {$this->table} WHERE {$where} LIMIT 1";
		} else 
			$sql = "SELECT * FROM {$this->table} LIMIT 1";

		return $this->db->query($sql);
	}

	// Выводить все записи, можно задать WHERE 
	public function findAll($where = null) {
		if ($where) {
			$sql = "SELECT * FROM {$this->table} WHERE {$where}";
		} else {
			$sql = "SELECT * FROM {$this->table}";
		}
		return $this->db->query($sql);
	}

	// Позволяет сделать свой SQL - запрос
	public function newSql($sql, $params = []) {
		return $this->db->query($sql, $params);
	}

	/* Команда SQL - INSERT
	* принимает только ассоциативный массив - вот такой :
	* [
	*  'field_in_db' => 'value'
	* ]
	* field_in_db - это название столбца в таблице бд, а значение - это значение поля 
	*/
	public function insert(array $fields) {
		if (is_assoc($fields) && $this->checkFields($fields)) {
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





	/* 
	* Проверяет правила, то есть у нас есть массив $routes, там перечисляются ключи
	* эти ключи означают, какие поля можно заполнять при выполнении команды например: INSERT
	* Функция проверяет пришедшие поля, есть ли они в массиве $routes - если нету, то выводится ошибка, что нельзя заполнить это поле)
	*/
	protected function checkFields(array $fields) {
		if (is_array($this->routes)) { // берем все правила
			$permitted_fields = implode(',', $this->routes); 
			foreach ($fields as $key => $value) {  // перечисляем пришедшие поля
				if (strpos($permitted_fields, $key) === false) { // если в routes - нету поле, который пришел то выводим ошибку
					echo 'Ошибка - вы не можете заполнить данные, так как поле находится в черном списке';
					return false;
				}
			}
		}
		return true; // если все хорошо - то все хорошо) 

	}

}
