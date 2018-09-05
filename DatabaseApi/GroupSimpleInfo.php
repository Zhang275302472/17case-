<?php
require ('DataBaseIO.php');
class GroupSimpleInfo
{
    /*
     * 添加新工作室
     * name
     * slftitle
     * profile
     */
    function addGroupSimple($viewdata)
    {

            $ex = new mydata();
            $result=$ex->mcm_add("GroupSimpleList", $viewdata);
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
     * 获得所有工作室数据
     */
    
    function getAllGroupSimple()
    {
        $ex = new mydata();
        $filter='{"$where":{"id":"id"}}';
        $result=$ex->mcm_findAll("GroupSimpleList", $filter);
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
     * 删除工作室数据
     */
    function deleteGroupSimple($id)
    {
        $ex = new mydata();
        $result=$ex->mcm_delete("GroupSimpleList", $id);
        $pos=strpos ( $result, 'error');
        if($pos===false)
        {
            return 2;
        }
        else
        {
            return -1;
        }
    
    }
    /*
     * 通过工作室名查询
     */
    function getSimpleGroupByName($name)
    {
        $ex = new mydata();
        $filter='{"where":{"name":"'.$name.'"}}';
        $result=$ex->mcm_findAll("GroupSimpleList", $filter);
        $pos=strpos( $result, 'error');
        if($pos===false)
        {
            $result=json_decode($result,true);
            $result = $result[0];
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
    function getSimpleGroupById($id)
    {
        $ex = new mydata();
        $filter='{"where":{"id":"'.$id.'"}}';
        $result=$ex->mcm_findAll("GroupSimpleList", $filter);
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
    
    /*
     * 更新工作室数据
     */
    function updateGroupSimple($viewdate)
    {
        $ex = new mydata();
        $tel = $viewdate['tel'];
        $name = $viewdate['name'];
        $filter='{"where":{"tel":"'.$tel.'"}}';
        $findId=$ex->mcm_findAll("GroupSimpleList", $filter);
        $findId=json_decode($findId,true);
        $findId=$findId[0];
        $id=$findId['id'];
        $result=$ex->mcm_update("GroupSimpleList",$id, $viewdate);
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