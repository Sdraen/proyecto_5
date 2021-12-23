<?php 
include_once("../conexion_bd/conexion.php");
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
    if (isset($_FILES['imagen']) && $_POST['id']) {
        $fileTmpPath = $_FILES['imagen']['tmp_name'];
        $fileName = $_FILES['imagen']['name'];
        $fileSize = $_FILES['imagen']['size'];
        $fileType = $_FILES['imagen']['type'];
        $fileNameCmps = explode(".", $fileName);
        $id= $_POST['id'];
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $allowedfileExtensions = array('jpg', 'gif', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'].'/imagenes/';
            $dest_path = $uploadFileDir . $newFileName;
             
            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
                $update = "update producto set archivo='".$newFileName."' where prod_id=".$id;
                $conn -> query($update);
                header('Location: ../index.php');
            }
            else
            {
             $message = 'Error al guardar el archivo';
             header('Location: ../index.php');
            }
        }
        header('Location: ../index.php');
    }
    header('Location: ../index.php');
?>