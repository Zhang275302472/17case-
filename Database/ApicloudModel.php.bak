<?php
/**
* ApicloudModel
*/
require('Http.php');
class ApicloudModel extends Http {
	
	protected $http;
    protected $appid = "A6061186449352";
    protected $appkey = "FE61DC16-4C10-67CD-3CE7-8BB867BE572A";
    // protected $appid = "A6961432222584";
    // protected $appkey = "179AD9D4-FEF1-30DF-2D6C-606FD8C9CB73";


	function __construct()
	{
    	$now = time();
		$this->httpheader = array(
            "X-APICloud-AppId: ".$this->appid,
            "X-APICloud-AppKey: ".sha1($this->appid."UZ".$this->appkey."UZ".$now).".".$now
        );
	}
}
?>