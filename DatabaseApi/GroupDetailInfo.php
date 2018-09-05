<?php
require ('DataBaseIO.php');
class GroupDetailInfo
{
        /*
         * 添加新工作室
         * name
         *
         */
        function addGroupDetail($viewdata)
        {

                $ex = new mydata();
                $result=$ex->mcm_add("GroupDetailList", $viewdata);
                $pos=strpos ( $result, 'error');
                if($pos===false)
                {
                    
                    return 1;
                }
                else
                {
                     
                    return -1;
                }
        
    
    }
    /*
     * 获得所有工作室数据
     */
    
    function getAllGroupDetail()
    {
    
        $ex = new mydata();
    
        $filter='{"$where":{"id":"id"}}';
        $result=$ex->mcm_findAll("GroupDetailList", $filter);
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
    function deleteGroupDetail($id)
    {
 
        $ex = new mydata();
        $result=$ex->mcm_delete("GroupDetailList", $id);
        $pos=strpos ( $result, 'error');
        if($pos===false)
        {
            return 1;
        }
        else
        {
            return -1;
        }
    
    }
    /*
     * 通过工作室名查询
     */
    function getDetailGroupByName($name)
    {

        $ex = new mydata();
        $filter='{"where":{"name":"'.$name.'"}}';
        $result=$ex->mcm_findAll("GroupDetailList", $filter);
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
    function getDetailGroupById($id)
    {
  
        $ex = new mydata();
        $filter='{"where":{"id":"'.$id.'"}}';
        $result=$ex->mcm_findAll("GroupDetailList", $filter);
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
     * 更新工作室数据
     */
    function updateGroupDetail($viewdate)
    {
  
        $ex = new mydata();
        $tel = $viewdate['tel'];
        $filter='{"where":{"tel":"'.$tel.'"}}';
        $findId=$ex->mcm_findAll("GroupDetailList", $filter);
        $findId=json_decode($findId,true);
        $findId=$findId[0];
        $id=$findId['id'];
        $result=$ex->mcm_update("GroupDetailList",$id, $viewdate);
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
