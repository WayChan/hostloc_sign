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
for($i=233;$i<246;$i++)
{
        getData(str_replace("*",$i,$spaceUrl));
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
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.hostloc.com/');
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
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
}
echo "You have got 20 points at:\n";
echo $showtime=date("Y-m-d H:i:s\n");
?>
