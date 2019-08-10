<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Wyszukaj rekord</title>
</head>

<body>
<div id="main">
	<form method="POST">
	<p>Wpisz imię albo nazwisko: <input type="text" name="search" id="search"></p>
	<button name="submit" class="btn btn-secondary">Szukaj</button>
	</form>
	<table>
	<?php
if (isset($_POST["submit"])){
	$search = "%{$_POST['search']}%";
	$search = trim($search);
	if (strlen($search)<=3){
echo '<h5 id="err">Wpisz dłuższy wyraz!</h5>';
	}
	else {
		$conn = new mysqli("localhost", "root", "", "imiona1");
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die ("Connection failed: " . $conn->connect_error);
		}
		$stmtpre = $conn->prepare("SELECT * FROM imiona WHERE name LIKE ? OR surname LIKE ?");
		$stmtpre->bind_param("ss", $search, $search);
		$stmtpre->execute();
		$result = $stmtpre->get_result();
		if ($result->num_rows === 0) {
			echo '<h5 id="err">Nie ma takiego wyniku!</h5>';
			$stmtpre->close();
            $conn->close();
			die;
		}
		else {
			$count = 1;
			 echo "<tr class='b'>";
 			 echo "<td>Numer</td>";
  			 echo "<td>Imię</td>";
  			 echo "<td>Nazwisko</td>";
  			 echo "<td>Wiek</td>";
  			 echo "</tr>";
			while ($row = $result->fetch_assoc()) {
				$name = $row['name'];
				$surname = $row['surname'];
				$age = $row['age'];
				echo "<tr>";
				echo "<td>".$count. ".</td>";
				echo "<td>".$name. "</td>";
				echo "<td>".$surname. "</td>";
				echo "<td>".$age. "</td>";
				echo "</tr>";
				$count++;
			  }
			  $stmtpre->close();
		}
		
	}
}

?>
	</table>
	</div>
	
</body>
</html>


