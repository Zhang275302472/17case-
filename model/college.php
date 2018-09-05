<?php
require ('DatabaseApi/collegeInfo.php');
class College{
    /*
     * 锟斤拷锟斤拷锟斤拷锟侥�
     */
    function getUser()
    {
        $user=new collegeInfo();
        $mc=$user->getAllUser();
        if($mc!=-1)
        {
            for($i=0;$i<count($mc);$i++)
            {
                if(isset($mc[$i]['photo']))
                {
                    $mc[$i]['photo']=$mc[$i]['photo']['url'];
                }
            }
            
            for($i=0;$i<count($mc);$i++)
            {
                if($mc[$i]['createdAt']<'2018-06-25')
                {
                    $r = array(
                        'title' => $mc[$i]['username'],
                        'slftitle'=>$mc[$i]['level'],
                        'decList'=>array(
                            array(   "cate"=>$mc[$i]['p1']) ,
                            array(   "cate"=>$mc[$i]['p2']) ,
                            array(   "cate"=>$mc[$i]['p3'])
                        ),
                        'photo' => $mc[$i]['photo'],
                    );
                    $res[] = $r;
                }
            }
            $res=json_encode($res);
            return $res;
        }
        else 
        {
            $res=array(
                'code'=>-1    );
            $res=json_encode($res);
            return $res;
        }
       
         
    }
    function collegeLogin($mobile, $password)
    {
        $user=new collegeInfo();
        $result=$user->UserLogin($mobile, $password);
        if($result!=-1&&$result!=0)
        {			
             $res=array(
            'username'=>$result[0]['username'],
            'headshot'=>$result[0]['photo']['url'],
            'mobile'=>$result[0]['mobile'],
            'code'=>1,
            'id'=>$result[0]['id']
                         );
             $res=json_encode($res);
             return $res;
        }
        else if($result==0)
        {		
             $res=array(
            'code'=>0    );
             $res=json_encode($res);
             return $res;
        }
        else
        {		
            $res=array(
                'code'=>-1);
            $res=json_encode($res);
            return $res;
        }
    }
    
    function collegeRegister2($viewdata)
    {
        $user=new collegeInfo();
        $result=$user->updateUser($viewdata);
        if($result==-1)
        {
            $res=array(
                'code'=>-1    );
            $res=json_encode($res);
            return $res;
            
        }
        else if($result==0)
        {
             $res=array(
            'code'=>0    );
             $res=json_encode($res);
             return $res;
        }  
        else 
        {
         
            $res=array(
                'username'=>$result['username'],
             //   'headshot'=>$result['photo'],
                'code'=>1,
                'id'=>$result['id']
            );
            $res=json_encode($res);
            return $res;
        }
    }
    
    function collegeRegister($viewdata)
    {
        $user=new collegeInfo();
        $result=$user->getUserBymobile($viewdata['mobile']);
        if($result!=1)
        {
    
            $add=$user->addUser($viewdata);
            $res=array(
                'id'=>$add['id']
            );
            $res=json_encode($res);
            return $res;
        }
        else
        {
            $res=array(
                'code'=>-1    );
            $res=json_encode($res);
            return $res;
        }
    }
    function getUserDetail($id)
    {
        $user=new collegeInfo();
        $result=$user->getDetailUserById($id);
        if($result==-1)
        {
        	$res=array(
        		'code'=>-1
        	);
        	$res=json_encode($res);
        	return $res;
        	}
        	else{  
        			             
              $res=array(
                  "entertype"=> $result[0]["entertype"],
                  "nickname"=> $result[0]["username"],
                  "sex"=> $result[0]["sex"],
                  "city"=> $result[0]["city"],
                  "phone"=> $result[0]["mobile"],
                  "school"=> $result[0]["school"],
                  "age"=> $result[0]["age"],
                  "major"=> $result[0]["major"],
                  "email"=>$result[0]['email'],
                  "desc"=>$result[0]["description"]                
              );
           		$res=json_encode($res);
            		return $res;
 
        		}

    }
    
    function editCollege($viewdata)
    {
        $user=new collegeInfo();
        $result=$user->updateUser($viewdata);
        if($result==-1)
        {
            $res=array(
                'code'=>-1    );
            $res=json_encode($res);
            return $res;
        
        }
        else if($result==0)
        {
            $res=array(
                'code'=>0    );
            $res=json_encode($res);
            return $res;
        }
        else
        {		             
                  $res=array(
                  "entertype"=> $result["entertype"],
                  "nickname"=> $result["username"],
                  "sex"=> $result["sex"],
                  "city"=> $result["city"],
                  "phone"=> $result["mobile"],
                  "school"=> $result["school"],
                  "age"=> $result["age"],
                  "major"=> $result["major"],
                  "email"=>$result['email'],
                  "desc"=>$result["description"]                  
              );
            $res=json_encode($res);
            return $res;
        }
    }
    

}
?>
