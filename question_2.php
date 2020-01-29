<?php
//connecting to the database
$connect = mysqli_connect("localhost", "root", "", "assessment_test");

if($connect === false){
    die("Error: Could not connect . " . mysqli_connect_error());
}
// selecting database
 $db_select = mysqli_select_db($connect,"assessment_test");

//creating Teacher table
$sql_teacher = "CREATE TABLE Teacher(
	name VARCHAR(30) NOT NULL PRIMARY KEY,
    subjects VARCHAR(30) NOT NULL,
    headOfGrade VARCHAR (10) NOT NULL,
    salary INT(10)
  )";

if(mysqli_query($connect,$sql_teacher)){
    echo "Teacher Table created successfully.";
} else{
    echo "ERROR: Could not able to Create  Teacher table. " . mysqli_error($connect);
}

// creating student table
/*
To link both tables I have use foreign key 'name' for teacher name
*/

$sql_student = "CREATE TABLE Student(
    name VARCHAR(30) NOT NULL PRIMARY KEY,
    age INT(10) NOT NULL,
    grade INT (10) NOT NULL,
    classTeacher VARCHAR(70),
    subjects VARCHAR(70),
    foreign key(name) references Teacher(name) 
)";

if(mysqli_query($connect , $sql_student)){
    echo "Student Table created successfully.";
} else{
    echo "ERROR: Could not able to Create Student table. " . mysqli_error($connect);
}

// close connection
mysqli_close($connect);
?>