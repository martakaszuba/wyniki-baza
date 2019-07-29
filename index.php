<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Marta Kaszuba - wyniki z bazy danych</title>
  
</head>

<body>
    <div id="main">
    <form action="show.php" method="post">
    <button name="show" class="btn btn-secondary">Pokaż</button>
</form>
<form action="change.php" method="post">
    <button name="change" class="btn btn-secondary">Zmień</button>
</form>
<form action="add.php" method="post">
    <button name="add" class="btn btn-secondary">Dodaj</button>
</form>
<form action="delete.php" method="post">
    <button name="delete" class="btn btn-secondary">Usuń</button>
</form>
<form action="find.php" method="post">
    <button name="find" class="btn btn-secondary">Wyszukaj</button>
</form>
    </div>
</body>
</html>



