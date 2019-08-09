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
	<p>Usuń dane rekordu o numerze id: <input type="number" name="ind" id="num"></p>
	<button name="submit" class="btn btn-secondary">Usuń</button>
	</form>
	<?php
if (isset($_POST["submit"])){
	$id = $_POST["ind"];
	if (!is_numeric($id) || $id<=0){
echo '<h5 id="err">Wpisz prawidłowy id!</h5>';
	}
	else {
		$conn = new mysqli("localhost", "root", "", "imiona1");
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
		$sql = "DELETE FROM imiona WHERE id=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $id);
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


