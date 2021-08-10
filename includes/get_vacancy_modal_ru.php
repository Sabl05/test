<?php
require ('./db.php');

$vacancy_id = $_POST['prev_id'];
$v = "%".$vacancy_id."%";
$vacancy_id = "\"$v\"";
$sql = "select * from vacancy where id LIKE {$vacancy_id};";
$statement = $dbh->prepare($sql);
$statement->execute();
$vacancy = $statement->fetchAll(\PDO::FETCH_ASSOC);
//$log = date('Y-m-d H:i:s') . print_r($vacancy, true);
//file_put_contents(__DIR__ . '/Kaspi.txt', $log . PHP_EOL, FILE_APPEND);

print_r(json_encode($vacancy, JSON_UNESCAPED_UNICODE));
