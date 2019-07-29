<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Wyszukiwarka</title>
</head>
<body>
    <div id="main">
    <form method="POST">
        <p>Wyszukaj tytuł: <input type="text" name="txt"></p>
        <button name="sub" class="btn btn-secondary">Wyszukaj</button>
</div>
</form>
<div class="cen">
<ol>
        <?php
        if (isset($_POST["sub"]) && !empty(trim($_POST["txt"]))){
            $txt = $_POST["txt"];
            $txt = trim($txt);
            if ($txt !== ""){
                $conn = mysqli_connect("localhost", "root", "", "baz");
                $txt = mysqli_real_escape_string($conn, $_POST['txt']);
                mysqli_set_charset($conn,"utf8");
                $sql = "SELECT * FROM filmy WHERE tytul LIKE '%$txt%'";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows === 0){
                echo "<p class='err'>Nie znaleziono takiego wyniku!</p>";
                }
                else {
                while ($row = mysqli_fetch_assoc($result)){ 
                echo "<li>".$row["tytul"]."</li>";
                }
            }
                mysqli_close($conn);
            }
        }
?>
 </ol>
    </div>
</body>
</html>




