<?php

//recuperation de l'id cv du lien url
$id=$_GET["id_cv"];
echo'<center><div><h1>Choisissez une template</h1></div><br><br><br><br><br><br><br><div>
    
<div><a href="temp1.php?id_cv='.urldecode($id).'"><img src="temp4.png" width="300" height="300"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="temp2.php?id_cv='.urldecode($id).'"><img src="temp5.png" width="300" height="300"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="temp3.php?id_cv='.urldecode($id).'"><img src="temp3.png" width="300" height="300"></a></div>

</center>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    </style>
    <title>Document</title>
</head>
<body>

</body>
</html>