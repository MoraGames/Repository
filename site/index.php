<?php
	$servername = "localhost";
	$username = "root";
	$password = "rootPassword";
	
	// Create connection
	try {
	  $database = new PDO('mysql:host=db;dbname=localhost', 'root', 'test');
	} catch (PDOException $exc) {
	  die("[ERROR]: Exception catched: " . $exc -> getMessage() . "<br>");
	}
	
	// Check connection
	if ($connection -> connect_error == true) {
	  die("[ERROR]: Connection failed: " . $connection -> connect_error . "<br>");
	}
	
	$endpoint = "alpha";

	// Save Datas
	$writeQRY = "INSERT INTO Richieste (endpoint) VALUES (?)";
	$database -> prepare($writeQRY) -> execute([$endpoint]);
	
	// Read Datas
	$readQRY = "SELECT * FROM Richieste WHERE Apache = ?";
	$display = $database -> prepare($readQRY);
	$display -> execute([$endpoint]);

	// Front-end
	echo "Your access as been logged from Alpha.<br>";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>MGLB</title>
	</head>
	<body>
		<h1>Access list</h1>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Data</th>
					<th>Endpoint</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row = $display->fetch(PDO::FETCH_ASSOC)) : ?>
				<tr>
					<td><?php echo htmlspecialchars($row['ID']); ?></td>
					<td><?php echo htmlspecialchars($row['Data']); ?></td>
					<td><?php echo htmlspecialchars($row['endpoint']); ?></td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</body>
</html>