<?php
require_once 'Database/DataBaseIO.php';
class collegeInfo{
    /*
     * 娣诲姞鏂扮敤鎴�
     */
    function addUser($viewdata)
    {
     
        $ex = new mydata();
        $result=$ex->mcm_add("college", $viewdata);
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
     * 鑾峰緱鎵�鏈夌敤鎴锋暟鎹�
     */

    function getAllUser()
    {
        $ex = new mydata();  
        $filter='{"$where":{"id":"id"}}';
        $result=$ex->mcm_findAll("college", $filter);
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
     * 鍒犻櫎鐢ㄦ埛鏁版嵁
     */
    function deleteUser($id)
    {
        $ex = new mydata();
        $result=$ex->mcm_delete("college", $id);

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
     * 閫氳繃鐢ㄦ埛鍚嶆煡璇�
     */
    function getDetailUserByName($name)
    {
        $ex = new mydata();
        $filter='{"where":{"name":"'.$name.'"}}';
        $result=$ex->mcm_findAll("college", $filter);
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
     * 閫氳繃id鏌ヨ
     */
    function getDetailUserById($id)
    {
        $ex = new mydata();
        $filter='{"where":{"id":"'.$id.'"}}';
        $result=$ex->mcm_findAll("college", $filter);
        $pos=strpos ( $result, 'error');
        $result=json_decode($result,true);
        if($pos===false)
        {
            return $result;
        }
        else
        {
            return -1;
        }
    
    }
    
    /**
     * 閫氳繃鎵嬫満鍙锋潵鏌ユ壘
     * @param unknown $mobile
     * @return unknown|number
     */
    function getUserBymobile($mobile)
    {
        $ex = new mydata();
        $filter='{"where":{"mobile":"'.$mobile.'"}}';
        $result=$ex->mcm_findAll("college", $filter);
        $result=json_decode($result,true);
        if(sizeof($result,1)>10)
        {   
            return 1;
        }
        else
        {
            return -1;
        }
    
    }
    
    /*
     * 鏇存柊鐢ㄦ埛鏁版嵁
     */
    function updateUser($viewdate)
    {
        $ex = new mydata();
        $id = $viewdate['id'];
        $filter='{"where":{"id":"'.$id.'"}}';
        $findId=$ex->mcm_findAll("college", $filter);
        $findId=json_decode($findId,true);
        if(count($findId))
        {
            $findId=$findId[0];
            $id=$findId['id'];
            $result=$ex->mcm_update("college",$id, $viewdate);
            $result=json_decode($result,true);
              if(count($result))
                {
                    //娌℃湁鎵惧埌璇d鐨勯」鐩�
                    return $result;
                }
                else
                {
                    //淇敼鎴愬姛
                    
                    return 0;
                }
        }
        else 
        {
            return -1;
        }
   
    
    }
function userlogin($mobile,$password)
        {
        	 $ex = new mydata();
            if ($mobile!=NULL||$password!=NULL) {
                # code...
           	$filter='{"where":{"mobile":"'.$mobile.'","password":"'.$password.'"},"limit":1}';
            $result = $ex->mcm_findAll('college',$filter);     
            $result=json_decode($result,true); 
             if(!$result)
                {		 
                	return -1;                    
                }
            else{
            		 //echo '璐﹀彿鎴栧瘑鐮侀敊璇�';
                 return $result;
             	}
                	
                	
            }else{
                 //echo '璇疯緭鍏ュ唴瀹�';
                   return 0;
             }

     }

}
?>




