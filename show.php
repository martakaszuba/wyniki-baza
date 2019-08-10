<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Pokaż rekordy</title>
</head>
<body>
<table>
<?php
$conn = new mysqli("localhost", "root", "", "imiona1");
$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$stmt = $conn->prepare("SELECT * FROM imiona");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
  echo "<h5 id='err'>Nie ma wyników</h5>";
  die;
}
echo "<tr class='b'>";
  echo "<td>id</td>";
  echo "<td>Imię</td>";
  echo "<td>Nazwisko</td>";
  echo "<td>Wiek</td>";
  echo "</tr>";
while($row = $result->fetch_assoc()) {
  $id = $row['id'];
  $name = $row['name'];
  $surname = $row['surname'];
  $age = $row['age'];
  echo "<tr>";
  echo "<td>".$id. ".</td>";
  echo "<td>".$name. "</td>";
  echo "<td>".$surname. "</td>";
  echo "<td>".$age. "</td>";
  echo "</tr>";
}
$stmt->close();
?>
</table>
</body>
</html>


