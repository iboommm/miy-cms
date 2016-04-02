<?php
define("CLASS_DB","OPEN_GATE");


// ส่วนติดต่อกับฐานข้อมูล


class JSONcompile {

	function genJSON($table,$condition="") {
		require 'class.db.php';  
		$db = new DB();
		$conn = $db->conn_Open();
		if($condition == "") {
			$q="SELECT * FROM `miy_$table`";
		}else {
			$q="SELECT * FROM `miy_$table` where $condition";
		}
		$result = $conn->query($q);
		$fc = $result->field_count;
		$fl = $result->fetch_fields();
		$i=0;
		foreach ($fl as $val) {
            $row[$i] = $val->name;
            $i++;
        }
        $max=$i;   
        $i=0;
		while($rs = $result->fetch_assoc()){
			$j=0;
			while($j < $max) {
				$row_name = $row[$j];
				
				$json_data[$table][$i][$row_name] = $rs[$row_name];
				$j++;
			}
			$i++;
			
		}
		header("Content-type:application/json; charset=UTF-8");        
		header("Cache-Control: no-store, no-cache, must-revalidate");       
		header("Cache-Control: post-check=0, pre-check=0", false);  
		$json= json_encode($json_data);
		echo $json;
	}
}

$json = new JSONcompile();
if(!isset($_GET['condition'])) {
	$table = $_GET['table'];
	$json->genJSON("$table");
}else {
	$table = $_GET['table'];
	$condition = base64_decode($_GET['condition']);
	$json->genJSON("$table","$condition");
}


?>