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
	<form method="POST">
	<p>Zmień dane rekordu o numerze id: <input type="number" name="ind" id="num"></p>
	<p>Wpisz nowe imię: <input type="text" name="name" id="name"></p>
	<p>Wpisz nowe nazwisko: <input type="text" name="surname" id="surname"></p>
	<p>Wpisz nowy wiek: <input type="number" name="age" id="age"></p>
	<button name="submit" class="btn btn-secondary">Zmień</button>
	</form>
	<?php
if (isset($_POST["submit"])){
	$id = $_POST["ind"];
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$age = $_POST["age"];
	$name = trim($name);
	$name = htmlspecialchars($name);
	$surname = trim($surname);
	$surname = htmlspecialchars($surname);
	$age = trim($age);
	$age = htmlspecialchars($age);
	if (strlen($age) === 0 || strlen($name) === 0 || strlen($surname) === 0 || $age <=0 || $id<=0 ||
	!is_numeric($age) || !is_numeric($id)){
echo '<h5 id="err">Wpisz poprawne dane!</h5>';
	}
	else {
		$conn = new mysqli("localhost", "root", "", "imiona1");
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die ("Connection failed: " . $conn->connect_error);
		}
		$stmtpre = $conn->prepare("SELECT * FROM imiona WHERE id=?");
		$stmtpre->bind_param("i", $id);
		$stmtpre->execute();
		$result = $stmtpre->get_result();
		if ($result->num_rows === 0) {
			echo '<h5 id="err">Nie ma takiego id!</h5>';
			$stmtpre->close();
            $conn->close();
			die;
		}
		$sql ="UPDATE imiona SET name=?, surname=?, age=? WHERE id=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssii", $name, $surname, $age, $id);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		header("Location:index.php");
	}
}

?>
	</div>
</body>
</html>


