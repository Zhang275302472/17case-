<?php 
	require('Database/example-Mcm.php');
	class mydata extends example_Mcm{
		public function mcm_add($table, $data){// 添加数据
			$mcm = new McmModel();
			 return $mcm->objAdd($table,$data);  
		}
		public function mcm_findAll($table, $filter){  //查询数据
			$mcm = new McmModel();
			return $mcm->objFindAll($table,$filter);
		}
		public function mcm_delete($table, $id){
			$mcm = new McmModel();
			return $mcm->objDelete($table,$id);
		}
		
		public function mcm_count($table){  //统计对象数量
			$mcm = new McmModel();
			return $mcm->objCount($table);
		}
		
		public function mcm_exists($table, $id){  //判断对象是否存在ById 
			$mcm = new McmModel();
			return $mcm->objExists($table,$id);
		}
		 public function mcm_update($table,$id,$obj)//修该数据
    		{
        		$mcm=new McmModel();
        		return $mcm->objPut($table, $id, $obj);
    		}
	}
	
?> 