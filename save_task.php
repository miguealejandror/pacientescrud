<?php
    include("db.php");

    if(isset($_POST['btn_guardar'])){
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $telefono = $_POST['tel'];


        $query = "INSERT INTO Tb_Pacientes(Cedula, Nombre, Apellido, Correo, Telefono) 
        VALUES ('$cedula', '$nombre', '$apellido', '$correo', '$telefono')";

      $result = mysqli_query($conn, $query);
      if(!$result){
          die("Query Failed");
      }
      
      $_SESSION['mensaje']='Paciente guardado exitosamente';
      $_SESSION['tipo-mensaje']='success';

      header("Location: index.php");

    }
?>