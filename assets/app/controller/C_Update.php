<?php
require('../models/conection.php');

$id = (int)$_POST['id'];
$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Precio = (int)$_POST['Precio'];


$con = new Conection();

$productos = $con->UpdateProduct($id,$Nombre,$Descripcion,$Precio);

header("Location:../Views/adminV.php");