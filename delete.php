<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Usuń rekord</title>
</head>
<body>
    <div id="main">
    <form method="POST">
        <p>Usuń rekord z bazy z id :<input type="text" name="number"></p>
        <button name="sub" class="btn btn-secondary">Usuń</button>
</form>
</div>
<?php
if (isset($_POST["sub"])){
    $number = $_POST["number"];
    $conn = mysqli_connect("localhost", "root", "", "baz");
    mysqli_set_charset($conn,"utf8");
    //$numver = mysqli_real_escape_string($conn, $_POST['number']);
    $sql = "SELECT tytul FROM filmy WHERE id = $number";
    print_r(var_dump($sql));
    /*$result = mysqli_query($conn, $sql);
    if ($result->num_rows === 0){
        echo "Nie znaleziono takiego id!";
    }
    else {
        $sql2 = "DELETE from filmy WHERE id = $number"; 
        $result2 = mysqli_query($conn, $sql2);
        mysqli_close($conn);
        header("Location:index.php");
    }
    mysqli_close($conn);
    */
}

?>
</body>
</html>




