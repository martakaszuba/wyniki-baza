<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dodaj rekord</title>
</head>
<body>
    <div id="main">
    <form method ="POST">
<p>Dodaj nowy tytuł: <input type="text" name="tt"></p>
<button name="submit" class="btn btn-secondary">Dodaj</button>
</form>
</div>
<?php
if (isset($_POST["submit"])){
$conn = mysqli_connect("localhost", "root", "", "baz");
$title = mysqli_real_escape_string($conn, $_POST['tt']);
$sql = "INSERT INTO filmy (tytul) VALUES('$title')";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("Location:ind.php");
}

?>
</body>
</html>




