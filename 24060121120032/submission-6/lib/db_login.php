<?php
// Nama : Elisabeth zefanya putri
// Nim  : 24060121120032
// lab  : A2

// TODO 1 : setup & connect database
$db_host = 'localhost';
$db_database = 'responsi2';
$db_username = 'root';
$db_password = '';

$db = new mysqli($db_host, $db_username, $db_password, $db_database);

if ($db->connect_errno) {
    die("Could not connect to the database: <br/>" . $db->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
