<?php 
	error_reporting(E_ALL & ~E_NOTICE);
	if(!defined("CLASS_DB")) 
		exit("Access Denied");
	require_once 'class.key.php';
	class DB extends Key {

		private $key = array();
		function conn_Open() {
			$conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
			if ($conn->connect_error) {
			    die('Could not connect: ' . mysqli_connect_errno());
			}
			return $conn;
		}

		function queryExecute($table,$condition="",$mode="string") {
			if($condition == "") 
				$sql = "SELECT * FROM `miy_$table` ";
			else 
				$sql = "SELECT * FROM `miy_$table`  WHERE $condition";
			
			$conn = $this->conn_Open();
			$result = $conn->query($sql);
			if($mode === "string") {
				 $row = $result->fetch_assoc();
				 mysqli_close($conn);
				 $dataFetch = serialize($row);
				 return $dataFetch;
			}elseif ($mode == "number") {
				$num = $result->num_rows;
				mysqli_close($conn);
				return $num;
			} 
		}

		function updateExecute($table,$condition,$condition2, $rowID) {
			$sql = "SELECT * FROM `miy_$table`  WHERE $condition";
			$conn = $this->conn_Open();
			$sql = "UPDATE `miy_$table` SET $condition WHERE `$condition2` = $rowID;";
			$result = $conn->query($sql);
			mysqli_close($conn);
			if($result == true) {
				return 1;
			}else {
				return 0;
			}
		}

		function insertExecute($table,$value) {
			$sql = "INSERT INTO `miy_$table` VALUES ($value);";
			$conn = $this->conn_Open();
			$result = $conn->query($sql);
			mysqli_close($conn);
			if($result == true) {
				return 1;
			}else {
				return 0;
			}
		}
		function removeExecute($table,$value) {
			$sql = "DELETE FROM `miy_$table` WHERE `id` = $value;";
			$conn = $this->conn_Open();
			$result = $conn->query($sql);
			mysqli_close($conn);
			if($result == true) {
				return 1;
			}else {
				return 0;
			}
		}
	}

 ?>