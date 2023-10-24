<?php

include 'database.php';

$obj = new Database();

// $obj->insert("students", ["student_name"=>"Gautam Dheer","age"=>30,"city"=>"Goa"]);

// echo "Insert result is :";
// print_r($obj->getResult());

// $obj->update('students', ['student_name'=>'New World','age'=>41,'city'=>'Delhi'],'id = "5"');

// echo "Update result is :";
// print_r($obj->getResult());


// $obj->delete('students','id = "4"');

// echo "Delete result is :";
// print_r($obj->getResult());

$obj->sql("SELECT * from students");

echo "SQL result is :";
echo "<pre>";
print_r($obj->getResult());

?>