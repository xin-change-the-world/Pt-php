<?php

defined('PT_PATH') or die('Access denied!');

class DB {

	private $_pdo = null;
	//用于存放实例化的对象
	static private $_instance = null;
	
	//单例
	static protected function getInstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	private function __clone() {}
	
	private function __construct() {

		try {

			$this->_pdo = new PDO(DB_DNS, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES '.DB_CHARSET));
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {

			exit($e->getMessage());
		}
	}
	
	protected function add($_tables, Array $_addData) {

	}
	
	protected function update($_tables, Array $_param, Array $_updateData) {

	}

	protected function delete($_tables, Array $_param) {

	}
	
	protected function select($_tables, Array $_fileld, Array $_param = array()) {
		
	}

	private function execute($_sql) {

		try {

			$_stmt = $this->_pdo->prepare($_sql);
			$_stmt->execute();

		} catch (PDOException  $e) {

			exit('SQL语句：'.$_sql.'<br />错误信息：'.$e->getMessage());
		}
		
		return $_stmt;
	}
}
?>