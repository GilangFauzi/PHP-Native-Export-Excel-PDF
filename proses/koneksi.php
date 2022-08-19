<?php 
$server = "localhost";
$username = "root";
$pass = "";
$db = "si_perpus_gilangfauzi";

$conn = mysqli_connect($server,$username,$pass,$db);

if(!$db){
    die("Tidak terhubung dengan database". mysqli_connect_error());
}