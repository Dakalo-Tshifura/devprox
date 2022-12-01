<?php

$conn = require './config.php';

$name = $_POST["name"];
$surname = $_POST["surname"];
$date = $_POST["dateOfBirth"];
$idNumber = $_POST["idNumber"];

if (validateName($name) && validateName($surname) && validateDate($date)) {

    if (isIdNumberExist($conn, $idNumber)){
        die("Id number already exists");
    }

    if (insertIntoTable($conn, $name, $surname, $date, $idNumber)) {
        echo "User inserted";
        return;
    }
    echo "User not inserted";
}


function validateName($name)
{
    if (isset($name) && !empty($name) && preg_match("/^[a-zA-Z ]*$/", $name)) {
        return true;
    }
    return false;
}

function validateDate($date)
{
    if (isset($date) && !empty($date)) {
        return true;
    }
    return false;
}

function insertIntoTable($conn, $name, $surname, $date, $idNumber)
{
    $sql = "INSERT INTO users (Name, Surname, DateOfBirth,IdNumber) VALUES ('$name','$surname' ,'$date,'$idNumber')";

    if ($conn->query($sql) === true) {
        return true;
    }
    return false;
}

function isIdNumberExist($conn, $idNumber){
    $sql = "SELECT * FROM users WHERE IdNumber = ".$idNumber;
    if ($conn->query($sql)->num_rows === 1) {
        return true;
    }
    return false;
}

function validateIdNumber($idNumber){
      if (strlen((string)$idNumber) === 13) {
        return true;
      }
      return false;
}
?>