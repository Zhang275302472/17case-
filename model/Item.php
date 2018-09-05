<?php
require ('DatabaseApi/ItemInfo.php');
require('tool.php');
class Item{
   
    function getItemByType($type)
    {
        $tool=new Tool();
        $iteminfo=new ItemInfo();
        $mc=$iteminfo->getItemByitem_type($type);
        if($mc!=-1)
        {
            for($i=0;$i<count($mc);$i++)
            {
                $r=array(
                    'projectType'=>$mc[$i]['item_type'],
                    'tittle'=>$mc[$i]['item_name'],
                    'range'=>$mc[$i]['budget'],
                    'catogoryTagList'=>array(
                        array(   "category"=>$mc[$i]['tag1']) ,
                        array(   "category"=>$mc[$i]['tag2']) ,
                        array(   "category"=>$mc[$i]['tag3'])
                    ),
                    "recruiting"=>$mc[$i]['state'],
                    'recommend'=>$mc[$i]['recommend'],
                    'apply'=>$mc[$i]['apply'],
                    'browse'=>$mc[$i]['browse'],
                    "createdAt"=> $mc[$i]["createdAt"]
                );
                $res[]=$r;
            }
           $result=$tool->transformDate($res);
             $result=json_encode($result);
            return  $result;
        }
        else
        {
            $res=array(
                'code'=>-1    );
            $res=json_encode($res);
            return $res;
        }
     
    }
    function getItemBySimple()
    {
        $tool=new Tool();
        $iteminfo=new ItemInfo();
        $mc=$iteminfo->getItemByitem();
        if($mc!=-1)
        {
            for($i=0;$i<6;$i++)
            {
                $r=array(
                    'projectType'=>$mc[$i]['item_type'],
                    'tittle'=>$mc[$i]['item_name'],
                    'range'=>$mc[$i]['budget'],
                    'catogoryTagList'=>array(
                        array(   "category"=>$mc[$i]['tag1']) ,
                        array(   "category"=>$mc[$i]['tag2']) ,
                        array(   "category"=>$mc[$i]['tag3'])
                    ),
                    "recruiting"=>$mc[$i]['state'],
                    'recommend'=>$mc[$i]['recommend'],
                    'apply'=>$mc[$i]['apply'],
                    'browse'=>$mc[$i]['browse'],
                    "createdAt"=> $mc[$i]["createdAt"]
                );
                $res[]=$r;
            }
           $result=$tool->transformDate($res);
             $result=json_encode($result);
            return  $result;
        }
        else
        {
            $res=array(
                'code'=>-1    );
            $res=json_encode($res);
            return $res;
        }
     
    }
    function getItemDetail($id)
    {
        $iteminfo=new ItemInfo();
        $mc=$iteminfo->getItemById($id);
        $res=array(
            'projectType'=>$mc[$i]['item_type'],
            'tittle'=>$mc[$i]['item_name'],
            'range'=>$mc[$i]['budget'],
            'catogoryTagList'=>array(
                array(   "category"=>$mc[$i]['tag1']) ,
                array(   "category"=>$mc[$i]['tag2']) ,
                array(   "category"=>$mc[$i]['tag3'])
            ),
            "recruiting"=>$mc[$i]['state'],
            'recommend'=>$mc[$i]['recommend'],
            'apply'=>$mc[$i]['apply'],
            'browse'=>$mc[$i]['browse'],
            "createdAt"=> $mc[$i]["createdAt"]
        );
        return $res;
    }
}
?>




