<?
	function validateRecord($table, $conditions){
		$sql = 'SELECT * FROM '.$table.' ';
		
		if($conditions != '' && is_array($conditions) && count($conditions) > 0){
			$total_conditions = count($conditions);
			$sql .= 'WHERE ';
			foreach($conditions as $field => $value){
				$total_conditions--;
				
				if($total_conditions > 0){
					$sql .= $field.' = "'.$value.'" AND ';
				}else{
					$sql .= $field.' = "'.$value.'" ';
				}
			}
		}
		
		if(mysql_num_rows(mysql_query($sql)) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function getRecord($table, $field_name, $conditions){
		$sql = 'SELECT '.$field_name.' FROM '.$table.' ';
		
		if($conditions != '' && is_array($conditions) && count($conditions) > 0){
			$total_conditions = count($conditions);
			$sql .= 'WHERE ';
			foreach($conditions as $field => $value){
				$total_conditions--;
				
				if($total_conditions > 0){
					$sql .= $field.' = "'.$value.'" AND ';
				}else{
					$sql .= $field.' = "'.$value.'" ';
				}
			}
		}
		
		$res = mysql_query($sql);
		
		if($res && mysql_num_rows($res) > 0){
			
			$row = mysql_fetch_array($res);
			
			return $row[$field_name];
		}else{
			return ('');
		}
	}
	
	function validateUserAccess($currentPage, $userID){
		$fileName = substr($currentPage, 0, strlen($currentPage)-4).'.html';
		
		$submenuID = getRecord('menusubmenu', 'submenuID', array('fileName' => addslashes($fileName)));
		
		if(validateRecord('usermenusubmenu', array('userID' => $userID, 'submenuID' => $submenuID))){
			return true;
		}else {
			return false;
		}
	}
	
	function getItemStatus($item_id){
		if($item_id != ''){
			
			$status = get_field_value('orderItems', 'status', array('itemID' => $item_id));
			
			if($status == 'RF'){
                $return = 'Factory In';
            }else if($status == 'P'){
                $return = 'Not Received';
			}else if($status == 'PO'){
				$return = 'Process Out';
            }else if($status == 'FO'){
                $return = 'Finish Out';
			}else if($status == 'UP'){
                $return = 'Unable to Process';
			}else if($status == 'FB'){
                $return = 'Factory Out';
            }else if($status == 'BI'){
                $return = 'Branch In';
            }else if($status == 'ID'){
                $return = 'Item Delivered';
            }
			return $return;
		}
	}
	
	function deleteSubCategories($categoryID){
		
	}
?>