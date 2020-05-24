<?php
    include("db.php");

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $query = "DELETE FROM Tb_Pacientes WHERE id = $id";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }

        $_SESSION['mensaje'] = 'Paciente eliminado';
        $_SESSION['tipo-mensaje']='danger';
        header("Location: index.php");
    }



?>