<?php
set_time_limit(0);
$access_token = $_GET['access_token'];
$id = $_GET['id_group'];
$limit = $_GET['limit'];
$URL = "https://graph.facebook.com/graphql?q=node(".$id."){group_pending_stories.first(".$limit."){edges{node{id,actors{id,name},message{text},attachments{media{image.height(200){uri,width,height}}},id,creation_time}},page_info}}&access_token=".$access_token;
$ch = curl_init($URL);
curl_setopt_array($ch, array(
    CURLOPT_URL => $URL,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => true
));
$data = curl_exec($ch);
    curl_close($ch);
    echo $data;
