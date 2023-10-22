<?php

include 'database.php';

$obj = new Database();

$obj->insert("students", ["student_name"=>"Gautam Dheer","age"=>30,"city"=>"Goa"]);

echo "Insert result is :";
print_r($obj->getResult());

?>