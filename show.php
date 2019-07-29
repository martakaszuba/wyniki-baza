<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <?php
    $conn = mysqli_connect("localhost", "root", "", "baz");
 mysqli_set_charset($conn,"utf8");   
 $sql = "SELECT * FROM filmy"; 
 $result = mysqli_query($conn, $sql);
 while ($row = mysqli_fetch_assoc($result)){
     echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["tytul"]."</td>";
        }
        echo "</tr>";
        mysqli_close($conn);
?>
</table>
</body>
</html>




