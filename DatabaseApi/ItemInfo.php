<?php
require ('Database/DataBaseIO.php');
class ItemInfo{
    /*
     * 添加新项目
     */
    function addItem($viewdata)
    {
        $ex = new mydata();
        $result=$ex->mcm_add("item", $viewdata);
        $pos=strpos ( $result, 'error');
        if($pos===false)
        {
            $result=json_decode($result,true);
            return $result;
        }
        else
        {
            return -1;
        }
    }
    /*
     * 获得所有项目数据
     */

    function getAllItem()
    {
        $ex = new mydata();
        $filter='{"$where":{"id":"id"}}';
        $result=$ex->mcm_findAll("item", $filter);
        $pos  =  strpos ($result, 'error');
        if($pos===false)
        {
            $result=json_decode($result,true);
            return $result;
        }
        else
        {
            return -1;
        }
    }
    /*
     * 删除项目数据
     */
    function deleteItem($id)
    {
        $ex = new mydata();
        $result=$ex->mcm_delete("item", $id);

        $pos=strpos ( $result, 'error');
        if($pos===false)
        {
            $result=json_decode($result,true);
            return $result;
        }
        else
        {
            return -1;
        }
    }
    /*
     * 通过项目名称查询
     */
    function getItemByItem_Name($item_name)
    {
        $ex = new mydata();
       // $filter='{"where":{"item_name":"'.$item_name.'"}}';
         $filter='{"where":{"item_name":"小程序"}}';
        //$filter='{"where":{"item_name":{"like":"s%"}}}';
        $result=$ex->mcm_findAll("item", $filter);
        $pos=strpos( $result, 'error');
        if($pos===false)
        {
            $result=json_decode($result,true);
           
            return $result;
        }
        else
        {
            return -1;
        }
      
    }
    /*
     * 通过id查询
     */
    function getItemById($item_id)
    {
        $ex = new mydata();
        $filter='{"where":{"item_id":"'.$item_id.'"}}';
        $result=$ex->mcm_findAll("item", $filter);
        $pos=strpos ( $result, 'error');
        if($pos===false)
        {
            $result=json_decode($result,true);
            $result=$result[0];
            return $result;
        }
        else
        {
            return -1;
        }

    }
    
    function getItemByitem_type($item_type)
    {		
        $ex = new mydata();
        if($item_type=='全部'){
        	$filter='{"$where":{"id":"id"}}';
        	}else{
        		$filter='{"where":{"item_type":"'.$item_type.'"}}';
        		}
        $result=$ex->mcm_findAll("item", $filter);
			  $result=json_decode($result,true);
        if(count($result)){
        		//count 返回数组中元素个数
            return $result;
        }
        else
        {
            return -1;
        }
    
    }
       function getItemByitem()
    {		
        $ex = new mydata();
        $filter='{"$where":{"id":"id"}}';
        $result=$ex->mcm_findAll("item", $filter);
			  $result=json_decode($result,true);
        if(count($result)){
        		//count 返回数组中元素个数
            return $result;
        }
        else
        {
            return -1;
        }
    
    }
    

    /*
     * 更新项目数据
     */
    function updateItem($viewdata)
    {
   
        $ex = new mydata();
        $item_id = $viewdata['item_id'];
        $filter='{"where":{"item_id":"'.$item_id.'"}}';
        $findId=$ex->mcm_findAll("item", $filter);
        $findId=json_decode($findId,true);
        $findId=$findId[0];
        $id=$findId['id'];
        $result=$ex->mcm_update("item",$id, $viewdata);
        $pos=strpos ( $result, 'error');
        if($pos===false)
        {
            if($result==null)
            {
                //没有找到该id的项目
                return 0;
            }
            else 
            {
                   //修改成功
                return 1;
            }

        }
        else
        {
            return -1;
        }
    }
}
?>




