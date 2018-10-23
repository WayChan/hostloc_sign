<?php
$username = "USERNAME";
$password = "PASSWORD";
set_time_limit(600);
$suburl = "https://www.hostloc.com/member.php?mod=logging&action=login";
$loginInfo = array(
        "username" => $username,
        "password" => $password,
        "fastloginfield" => "username",
        "quickforward" => "yes",
        "handlekey" => "ls",
        "loginsubmit" => true
);
$login = postData($suburl,$loginInfo);
$spaceUrl = "https://www.hostloc.com/space-uid-*.html";
$UserAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36';

for($i=1;$i<20;$i++)
{
	$num = mt_rand(1,20000);
	echo "UID: ".$num."\t";
	getData(str_replace("*",$num,$spaceUrl));
}

function postData($url, $post_data)
{
        $ch = curl_init ();
        curl_setopt($ch , CURLOPT_POST , 1);
        curl_setopt($ch , CURLOPT_HEADER , 0);
        curl_setopt($ch , CURLOPT_URL , $url);
        curl_setopt($ch , CURLOPT_COOKIEJAR , 'hostloc.cookie');
        curl_setopt($ch , CURLOPT_POSTFIELDS , $post_data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,600);
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.hostloc.com/forum.php');
        curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
}
function getData($url)
{
        $ch = curl_init ();
        curl_setopt($ch, CURLOPT_HEADER , 0);
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'hostloc.cookie');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,600);
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.hostloc.com/forum.php');
        curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent);
        $result = curl_exec($ch);
        echo "CODE: ".curl_getinfo($ch, CURLINFO_HTTP_CODE)."\n";
        curl_close($ch);
        return $result;
}
echo "You have got 20 points at: ".date('Y-m-d H:i:s')."\n";
?>
