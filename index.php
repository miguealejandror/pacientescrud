<?php include("db.php")?>
<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-3">
            <?php if(isset($_SESSION['mensaje'])){?>
                <div class="alert alert-<?= $_SESSION['tipo-mensaje']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>   
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
            <?php session_unset();}?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="cedula" class="form-control" 
                        placeholder="Cédula" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" 
                        placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido" class="form-control" 
                        placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <input type="email" name="correo" class="form-control" 
                        placeholder="Correo Electronico">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tel" class="form-control" 
                        placeholder="Telefono">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="btn_guardar" 
                    value="Guardar">                 
                </form>            
            </div>
        </div>
        <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        
                        </tr>
                    
                    </thead>

                    <tbody>

                        <?php

                            $query = "SELECT * FROM Tb_Pacientes";
                            $resultado = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_array($resultado)){ ?>
                                <tr>
                                    <td><?php echo $row['Cedula'] ?></td>
                                    <td><?php echo $row['Nombre'] ?></td>
                                    <td><?php echo $row['Apellido'] ?></td>
                                    <td><?php echo $row['Correo'] ?></td>
                                    <td><?php echo $row['Telefono']?></td>
                                    <td>

                                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">

                                            <i class="fas fa-marker"></i>

                                        </a>

                                        <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                            
                                            <i class ="far fa-trash-alt"></i>
                                        
                                        
                                        </a>

                                    
                                    
                                    </td>
                                </tr> 
                           <?php }?>
                    
                    </tbody>
                
                </table>
            
        
        </div>
    </div>

</div>


<?php include("includes/footer.php")?>