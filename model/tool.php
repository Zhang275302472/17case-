<?php

class Tool{
 
    function transformDate($res)//转换时间格式
    {

     $time=array();
    $date=array();
    $a='0';     //时间的后六位
    $b='0';     //时间的前两位
    $i=0;
    $j=0;
    $today=date('Y-m-d');
    foreach ($res as $value)
    {
        if(substr($value['createdAt'], 0,10)<$today)
        {
            // echo "发布日期大于一天";
            $date[$i]=$res[$i];
            $date[$i]['createdAt']=substr($value['createdAt'], 0,10);
            // echo  $mc[$i]['createdAt'];
        }
        else
        {
            //echo "发布日期小于一天";
            $time[$j]=$res[$i];
            $a=substr($value['createdAt'], 11,8);
            $b=substr($a, 0,2)+8;
            $a=substr($a, 2,6);
            $time[$j]['createdAt']=$b.$a;
            $j++;

        }
        $i++;
    }
    foreach($date as $val)
    {
        $key_arrays[]=$val['createdAt'];
    }
    //array_multisort($key_arrays,SORT_DESC,SORT_STRING,$date);
    $time=self::compareTime($time);
    $res = array_merge($time, $date);
    return $res;
     
}
    
    
function compareTime($r)
{
    $temp=array();
    for($i=0;$i<count($r);$i++)
    {
        for($j=0;$j<count($r);$j++)
        {
            if(self::checkTime($r[$j]['createdAt'],$r[$i]['createdAt']))
            {
                $temp=$r[$i];
                $r[$i]=$r[$j];
                $r[$j]=$temp;
            }
        }
    }
    return $r;
}
    function checkTime($time,$date)
{
    if(substr($time, 0,2)>substr($date, 0,2))
    {
        return false;
         
    }
    else if (substr($time, 0,2)==substr($date, 0,2))
    {
        if(substr($time, 3,2)>substr($date, 3,2))
        {
           return false;
        }
        else if(substr($time, 3,2)==substr($date, 3,2))
        {
            if(substr($time, 6,2)>substr($date, 6,2))
            {
               return false;
            }
            else
            {
                return true;
            }
        }
        else
        {
                return true;
        }
    }
    else
    {
          return true;
    }
}
}
?>




