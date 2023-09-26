
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel='stylesheet' href='css/teste.css'>
    <title>Document</title>

</head>
<body>
<?php
$banana = "Email: ricardo@gmail.com";
echo '<script>';
echo 'console.log("Campo: ' . $banana . '");';
echo '</script>';
$batata = explode(": ", $banana);
foreach($batata as $i){
echo '<script>';
echo 'console.log("Campo: ' . $i . '");';
echo '</script>';
}
?>
</body>
</html>