<?php
    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM Tb_Pacientes WHERE id = $id";
        $result = mysqli_query($conn, $query);
        

       if(mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
            $cedula = $row['Cedula'];
            $nombre = $row['Nombre'];
            $apellido = $row['Apellido'];
            $correo = $row['Correo'];
            $tel = $row['Telefono'];

        }

        

    }

    if (isset($_POST['cancelar'])){

        header("Location: index.php");
    }
    if (isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['correo'];
        $telefono  = $_POST['telefono'];

        $query = "UPDATE Tb_Pacientes set Cedula = '$cedula', Nombre = '$nombre', Apellido = '$apellido', Correo ='$email',Telefono ='$telefono' WHERE id = $id";
        mysqli_query($conn,$query);

        $_SESSION['mensaje'] = 'Paciente actualizado';
        $_SESSION['tipo-mensaje']='info';
        header("Location: index.php");
    }


?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="row">
        
            <div class="col-md-4">
                <div class="card card-body">

                    <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="cedula" value="<?php echo $cedula?>"
                            class="form-control" placeholder="Actualiza la cedula">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre" value="<?php echo $nombre?>"
                            class="form-control" placeholder="Actualiza el nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" value="<?php echo $apellido?>"
                            class="form-control" placeholder="Actualiza el Apellido">
                        </div>
                        <div class="form-group">
                            <input type="email" name="correo" value="<?php echo $correo?>"
                            class="form-control" placeholder="Actualiza el correo">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" value="<?php echo $tel?>"
                            class="form-control" placeholder="Actualiza el telefono">
                        </div>
                        <button class="btn-success" name ="actualizar">
                            Actualizar
                        </button>
                        <button class="btn-danger" name = "cancelar">
                            Cancelar
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </div>

<?php include("includes/footer.php")?>