<!DOCTYPE html>
<html lang="en" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bus Stops</title>

	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" href="assets/css/app.css">
	<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
	
	  </head>
<script src="https://assets.codepen.io/assets/editor/live/console_runner-d0a557e5cb67f9cd9bbb9673355c7e8e.js" type="text/javascript"></script>

<style>
@import "http://fonts.googleapis.com/css?family=Montserrat:300,400,700";
.rwd-table {
  margin: 1em 0;
  min-width: 300px;
}
.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: .5em;
}
.rwd-table td:last-child {
  padding-bottom: .5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table td:before {
    display: none;
  }
}
.rwd-table th, .rwd-table td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child, .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child, .rwd-table td:last-child {
    padding-right: 0;
  }
}

body {
  padding: 0 2em;
  font-family: Montserrat, sans-serif;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
  color: #444;
  background: #eee;
}

h1 {
  font-weight: normal;
  letter-spacing: -1px;
  color: #34495E;
}

.rwd-table {
  background: #34495E;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table tr {
  border-color: #46637f;
}
.rwd-table th, .rwd-table td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th, .rwd-table td:before {
  color: #dd5;
}
</style>
  <body>
  <h1>List of People Who Donated!</h1>
<table class="rwd-table">
  <tr>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>AMOUNT</th>
  </tr>
  
<?php
require("phpsqlsearch_dbinfo.php");

// Get parameters from URL
$code = $_GET["stopcode"];

// Start XML file, create parent node

// Opens a connection to a mySQL server
  $con = mysqli_connect('localhost', $username, $password, $database);
  if (mysqli_connect_errno())
{
echo "connection was not established".mysqli_connect_error();
}

$query = sprintf("SELECT person_name, email, amount FROM donations WHERE stopcode = '%s'",
  mysqli_real_escape_string($con, $code));
$result = mysqli_query($con, $query);

if (!$result) {
  die("Invalid query: " . mysqli_error());
}

while ($row = @mysqli_fetch_assoc($result)){
 echo '<tr><td data-th="NAME">'. $row["person_name"].'</td><td data-th="EMAIL">'. $row["email"].'</td><td data-th="AMOUNT">'. $row["amount"].'</td></tr>';
}
?>
</table>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"><script>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
