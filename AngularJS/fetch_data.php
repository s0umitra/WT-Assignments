<?php
include('dbconnect.php');

$query = "SELECT * FROM lib_userJS ORDER BY id";
$statement = $connect->prepare($query);
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$data[] = $row;
	}
	echo json_encode($data);
}
?>
