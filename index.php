<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Baza danych - Marta Kaszuba</title>
</head>
<body>
<div id="main">
<form method="POST">
<button name="show" class="btn btn-secondary">Pokaż</button>
<button name="add" class="btn btn-secondary">Dodaj</button>
<button name="change" class="btn btn-secondary">Zmień</button>
<button name="delete" class="btn btn-secondary">Usuń</button>
<button name="find" class="btn btn-secondary">Wyszukaj</button>
</form>
</div>
<?php
if (isset($_POST["show"])){
header("Location:show.php");
}
else if (isset($_POST["add"])){
	header("Location:add.php");	
}
else if (isset($_POST["change"])){
	header("Location:change.php");	
}
else if (isset($_POST["delete"])){
	header("Location:delete.php");	
}
else if (isset($_POST["find"])){
	header("Location:find.php");	
}

?>


</body>
</html>


