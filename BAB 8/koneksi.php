<?php 

$servername = 'localhost';
$username = 'root';
$password = 'root'; //jika tidak ada password di kosongkan saja
$database = 'db_pethaven';

// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi
if(!$koneksi) {
    die('Connection Failed:' . mysqli_connect_error());
}
 ?>
