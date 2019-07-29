<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Zmień rekord</title>
</head>
<body>
    <div id="main">
    <form method="post">
    <p>Zmień element z id <input type="number" name="id"> na: <input type="text" name="text" id="txt"></p>
    <button name="sub" class="btn btn-secondary">Zmień</button>
</form>
</div>
</body>
</html>
<?php

if (isset($_POST["sub"])){
    $id = $_POST["id"];
    $newTxt = $_POST["text"];
    $id = trim($id);
    $newTxt = trim($newTxt);
    if (strlen($id) == 0){
        echo "Wpisz id!";
    }

    else if (strlen($newTxt) == 0){
        echo "Wpisz text!";
    }

    else {
        $conn = mysqli_connect("localhost", "root", "", "baz");
        mysqli_set_charset($conn,"utf8");
        $sql = "SELECT tytul FROM filmy WHERE id= $id";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows === 0){
            echo "Nie znaleziono takiego id!";
        }
        else {
            $sql2 = "UPDATE filmy SET tytul = '$newTxt' WHERE id = $id"; 
            $result2 = mysqli_query($conn, $sql2);
            header("Location:index.php");
        }
        mysqli_close($conn);
    }
    }


?>




