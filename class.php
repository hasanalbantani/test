<?php
	/**
	 * 
	 */
	class Mahindo
	{
		
		function __construct()
		{
			try {
				$this->db = new PDO('mysql:host=localhost;dbname=db_mahindo;','root','');
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				echo $e->getmessage();
			}
		}
		function setData($table, $data, $file = '')
		{
			foreach($data as $key => $value){
				$k[] = $key; 
				$v[] = "'".$value."'";
			}
			$k = implode(", ",$k);
			$v = implode(", ", $v);
			$sql = "insert into $table ($k) values($v)";
			$smt = $this->db->prepare($sql);
			$smt->execute();
		}
		function getData($table, $col, $keyword = '')
		{
			$sql = "select * from $table where $col like '%$keyword%'";
			$smt = $this->db->prepare($sql);
			$smt->execute();
			$check = $smt->rowCount();

			if($check > 0){
				foreach($smt as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}else{
				// echo "<script>alert('Data tidak ditemukan!');</script>";
			}
		}
	}
?>
