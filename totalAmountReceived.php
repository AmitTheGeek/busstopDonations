<?php
require("phpsqlsearch_dbinfo.php");

// Get parameters from URL
$amount_money = $_GET["code"];

//$amount_money = 12332;
// Start XML file, create parent node

// Opens a connection to a mySQL server
  $con = mysqli_connect('localhost', $username, $password, $database);
  if (mysqli_connect_errno())
{
echo "connection was not established".mysqli_connect_error();
}

// Search the rows in the busstops table
$query = sprintf("SELECT SUM(amount) AS sum FROM donations WHERE stopcode = '%s'",
  mysqli_real_escape_string($con, $amount_money));
$result = mysqli_query($con, $query);

$result = mysqli_query($con, $query);
if (!$result) {
  die("Invalid query: " . mysqli_error());
}

while ($row = @mysqli_fetch_assoc($result)){
 echo $row["sum"];
}

?>