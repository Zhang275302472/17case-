<?php
require ('DatabaseApi/companyInfo.php');
class Company{
    /*
     * 添加新项目
     */
    function getAllCompany()
    {
        $company=new companyInfo();
        $result=$company->getAllCompany();
        return $result;
         
    }
    function companyLogin($username, $password)
    {
        $user=new companyInfo();
        $result=$user->UserLogin($username, $password);
        return $result;
    
    }
    
    function companyRegister($viewdata)
    {
        $user=new collegeInfo();
        $result=$user->getUserBymobile($viewdata['mobile']);
        if($result!=1)
        {
            //电话不存在
            $add=$user->addUser($viewdata);
            return $add;
        }
        else
        {
            return -1;
        }
    
    }
}
?>