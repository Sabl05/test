<?php
try{
    $user = '';
    $pass = '';
    $host =  '';
    $dbname =  '';
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}
