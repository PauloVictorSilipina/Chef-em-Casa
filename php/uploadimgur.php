<?php
if ($_FILES["foto"]["size"] > 0){
    $client_id = "450e282f79474c3";
    $filename = $_FILES['foto']['tmp_name'];
    
    $image_data = file_get_contents($filename);
    $image_data_base64 = base64_encode($image_data);
    
    $api_url = 'https://api.imgur.com/3/image.json';
    
    $headers = [
        'Authorization: Client-ID ' . $client_id,
        'Content-Type: application/x-www-form-urlencoded'
    ];
    
    $postData = http_build_query(['image' => $image_data_base64]);
    
    $options = [
        'http' => [
            'header' => implode("\r\n", $headers),
            'method' => 'POST',
            'content' => $postData
        ]
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents($api_url, false, $context);
    
    if ($result === FALSE) {
        echo "Erro ao enviar arquivo para o Imgur";
    } else {
        $response = json_decode($result, true);
        $foto = $response['data']['link'];
    }
?>