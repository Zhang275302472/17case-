<?php
include "model/Item.php";
include "model/college.php";
include 'model/company.php';
/*
 $item=new Item();
 $type="����";
 $all=$item->getAllItem();
 echo $type;
 var_dump($all);
 */

 $viewdata=array(
 "mobile"=>'15588887777',
 "password"=>'123456',
  "code"=>1
 );
 $userdata=array(
     "entertype"=>'aa',
     "username"=> '拉普拉羊',
     "sex"=> '女',
     "city"=> '武汉',
     "mobile"=> '15699998888',
     "school"=> '北京大学',
     "age"=> 22,
     "major"=>'软件工程',
     "email"=>'4535t3543@qq.com',
     "description"=>'极具契约精神'
 );
 $u=array(
     "mobile"=> '15699998888',
     "username"=> 'aaaaa'

    
 );
 $mobile="11";
 $username="aaaa";
 $password="123";
 $user=new College();
 $alluser=$user->collegeRegister2($u);
var_dump($alluser);

 
/*
 $company=new Company();
 $allcompany=$company->getAllCompany();
 var_dump($allcompany);
 */