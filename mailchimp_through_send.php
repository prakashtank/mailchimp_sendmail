<?php
//require_once('mailchimpint/mcapi/inc/MCAPI.class.php');
$apikey = '*******************';
$to_emails = array('prakashtank106@gmail.com', 'abc@gmail.com');
$to_names = array('d', 'fssddf');

$message = array(
    'html'=>'Yo, this is the <b>html</b> portion',
    'text'=>'Yo, this is the *text* portion',
    'subject'=>'This is the subject',
    'from_name'=>'Me!',
    'from_email'=>'',
    'to_email'=>$to_emails,
    'to_name'=>$to_names
);

$tags = array('WelcomeEmail');

$params = array(
    'apikey'=>$apikey,
    'message'=>$message,
    'track_opens'=>true,
    'track_clicks'=>false,
    'tags'=>$tags
);

$url = "http://us5.sts.mailchimp.com/1.0/SendEmail";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
echo $result;
curl_close ($ch);
var_dump($result);
$data = json_decode($result);
echo "Status = ".$data->status."\n";
?>

