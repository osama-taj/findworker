<?php



	function getAllFrom($field, $table, $where = NULL, $and = NULL, $orderfield, $ordering = "DESC") {
		global $con;
		$getAll = $con->prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");
		 try{
			$getAll->execute();
		 }catch(Exception $e ){
			 return null;
		}
		$all = $getAll->fetchAll();
		return $all;

	}


	function fromAll($where = NULL){
		global $con;
		$stmt = $con->prepare("SELECT users.user_name,users.pic,depart.depart_name,works.work_id,works.work_depart_id,works.user_id,
		works.work_date,works.work_pic,works.work_id,works.work_topping, works.work_describe,works.work_pop FROM 
		 `works`
		 INNER JOIN users ON works.user_id=users.user_id
		 INNER JOIN  depart ON works.work_depart_id=depart.depart_id 
		 $where ORDER BY works.work_id DESC ");
		 $stmt->execute();
		 $row = $stmt->fetchAll();
		 return $row;
	} 




?>