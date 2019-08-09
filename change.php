<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Dodaj rekord</title>
</head>
<style>
#main {
	text-align:center;
	margin:50px auto;
}

#err {
	color:red;
	margin:10px;
}
</style>
<body>
<div id="main">
	<form method="POST">
	<p>Wpisz imię: <input type="text" name="name" id="name"></p>
	<p>Wpisz nazwisko: <input type="text" name="surname" id="surname"></p>
	<p>Wpisz wiek: <input type="number" name="age" id="age"></p>
	<button name="submit" class="btn btn-secondary">Dodaj</button>
	</form>
	<?php
if (isset($_POST["submit"])){
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$age = $_POST["age"];
	$name = trim($name);
	$surname = trim($surname);
	$age = trim($age);
	if (strlen($age) ===0 || strlen($name) ===0 || strlen($surname) ===0 || !is_numeric($age)){
echo '<p id="err">Wpisz poprawne dane!<p>';
	}
	else {
		$conn = new mysqli("localhost", "root", "", "imiona");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql ="INSERT INTO imiona (name, surname, age) VALUES (?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssi", $name, $surname, $age);
		$stmt->execute();
		print_r($conn);
		$stmt->close();
        $conn->close();
	}
}

?>
	</div>
</body>
</html>


