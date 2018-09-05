<?php
include "model/Item.php";
include "model/college.php";
include 'model/company.php';
/*
$item=new Item();
$type="开发";
$all=$item->getAllItem();
echo $type;
var_dump($all);
*/
/*
$viewdata=array(
    "mobile"=>'1231321',
    "password"=>'aaaaa'
);
$mobile="11";
$username="aaaa";
$password="123";
$user=new College();
$alluser=$user->register($viewdata);
var_dump($alluser);
*/
/*
$company=new Company();
$allcompany=$company->getAllCompany();
var_dump($allcompany);
*/



header('Access-Control-Allow-Origin:*');  
// 鍝嶅簲绫诲瀷  

header('Access-Control-Allow-Methods:GET'); 
// 鍝嶅簲澶磋缃�  
header('Access-Control-Allow-Headers:x-requested-with,content-type'); 
  if (isset($GLOBALS['HTTP_RAW_POST_DATA'])) {
      $final = $GLOBALS['HTTP_RAW_POST_DATA'];
  } else {
      $final = file_get_contents('php://input');
  };
       $final = json_decode($final,true);
if ($_SERVER["REQUEST_METHOD"] == "GET")
  {
      switch ($_GET['action'])
      {							         
           case "getItemByType"   :
             	 $type=$_GET['type'];	
             	 $item=new Item();
             	 $result=$item->getItemByType($type);
             	 echo $result;
             	 break;
          case "getItemSimple"   :
             	 $item=new Item();
             	 $result=$item->getItemBySimple();
             	 echo $result;
             	 break;      	 
           case "getPersonSimple"   :
             	 $college=new College();
             	 $result=$college->getUser();
                 echo $result;
             	 break;
           case "getItemDetail":
                 $item=new Item();
                 $id=$_GET['id'];
                 $result=$item->getItemDetail($id);
                 echo $result;
                 break;
           case "getPersonDetail":
                 $college=new College();
                 $id=$_GET['id'];
                 $result=$college->getUserDetail($id);
                 echo $result;
                 break;
      }
       
  } 
  else if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
      switch ($_GET['action'])
      {
          case "login":          
                 $mobile= $final["mobile"];
                 $password= $final["password"];            
                 $college=new College();
                 $mc=$college->collegeLogin($mobile,$password);
                 echo $mc;
                 break; 
          case "register":
                  $userdata =array(
                  "mobile"=> $final["mobile"],
                  "password"=> $final["password"],
                  );
                  $college=new College();
                  $mc=$college->collegeRegister($userdata);
              	  echo $mc;
                  break;
         case "register2":
                  $userdata =array(
                  "id"=>$final["id"],
                   "username"=> $final["username"],
                   "code"=>$final['code']
                   );
                  $college=new College();
                  $mc=$college->collegeRegister2($userdata);
                  echo $mc;
                  break;
          case "editCollege":
              $userdata=array(
              		"id"=>$final["id"],
                  "entertype"=> $final["entertype"],
                  "username"=> $final["nickname"],
                  "sex"=> $final["sex"],
                  "city"=> $final["city"],
                  "mobile"=> $final["phone"],
                  "school"=> $final["school"],
                  "age"=> $final["age"],
                  "major"=> $final["major"],
                  "email"=>$final['email'],
                  "description"=> $final["desc"] 
                   );
                 $college=new College();
                 $mc=$college->editCollege($userdata);
                 echo $mc;
                 break;
      }
  }

   
     
     

?>