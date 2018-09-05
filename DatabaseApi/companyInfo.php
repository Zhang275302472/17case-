<?php
require_once 'Database/DataBaseIO.php';
class companyInfo{
    /*
     * 添加新用户
     */
    function addCompany($viewdata)
    {
     
        $ex = new mydata();
        $result=$ex->mcm_add("company", $viewdata);
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
     * 获得所有用户数据
     */

    function getAllCompany()
    {
        $ex = new mydata();  
        $filter='{"$where":{"id":"id"}}';
        $result=$ex->mcm_findAll("company", $filter);
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
     * 删除用户数据
     */
    function deleteCompany($id)
    {
        $ex = new mydata();
        $result=$ex->mcm_delete("company", $id);

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
     * 通过用户名查询
     */
    function getDetailCompanyByName($name)
    {
        $ex = new mydata();
        $filter='{"where":{"name":"'.$name.'"}}';
        $result=$ex->mcm_findAll("company", $filter);
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
    function getDetailCompanyById($id)
    {
        $ex = new mydata();
        $filter='{"where":{"id":"'.$id.'"}}';
        $result=$ex->mcm_findAll("company", $filter);
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
    
    /**
     * 通过手机号来查找
     * @param unknown $mobile
     * @return unknown|number
     */
    function getDetailCompanyBymobile($mobile)
    {
        $ex = new mydata();
        $filter='{"where":{"mobile":"'.$mobile.'"}}';
        $result=$ex->mcm_findAll("company", $filter);
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
     * 更新用户数据
     */
    function updateCompany($viewdate)
    {
        $ex = new mydata();
        $tel = $viewdate['tel'];
        $filter='{"where":{"tel":"'.$tel.'"}}';
        $findId=$ex->mcm_findAll("company", $filter);
        $findId=json_decode($findId,true);
        $findId=$findId[0];
        $id=$findId['id'];
        $result=$ex->mcm_update("company",$id, $viewdate);
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




