<?php
 
    require_once 'config/config.php';
    require_once 'config/clase_sql.php';

    # Objeto para heredar | La variable $clase_cli hereda todo de la Clase_sql
    $clase_par = new Clase_sql();

    $result_par = $clase_par-> ConsultaParaleloGeneral();
 

?>
<?php include("includes/header.php") ?>

    <div class="container " style="margin-top: 50px">
    
        <div class="card">
            <div class="card-header bg-dark     text-white">
                <div class="form-group row">
                    <div class="col-7">
                    <i class="fa fa-graduation-cap"></i><span class="h4"> Paralelos</span>
                    </div>
                    
                    <div class="col-5 text-right">
                        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#modal1">Nuevo paralelo</button>
                    </div>

                </div>
            </div>
            
           <div class="card-body">
                <table class="table table-hover"id="dtcli2"> 
                    <thead class="thead-dark grey">
                        <tr class="row">
                        <th class="col">CODIGO</th>
                        <th class="col">NOMBRE</th>
                        <th class="col">OPCIONES</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                        <!---Ciclo While para agregar datos de la clase_sql en una Variable $f --> 
                        <?php while($f = $result_par->fetch_assoc()){ ?>
                    <tr class="row">
                        <td class="col"> <?php echo $f['PAR_CODIGO']; ?> </td>
                        <td class="col text-upercase"> <?php echo $f['PAR_NOMBRE']; ?> </td>
                        <td class="col">
                            <a href="funciones/editar_paralelo.php?PAR_CODIGO=<?php echo $f['PAR_CODIGO']?>" class="btn btn-success">
                          
                               <i class="fas fa-marker"></i>
                            </a>
                            <a href="funciones/eliminar_paralelo.php?PAR_CODIGO=<?php echo $f['PAR_CODIGO']?>" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>                    
                    </tr>
                    
                        <?php }?>
                </tbody>

                </table>
           </div>
        </div>


    </div>

    <!--Ventana modal insertar-->
    <div class="modal fade" id="modal1">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <i class="fa fa-graduation-cap"></i><span class="h4">   Paralelos</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="funciones/insertar_paralelo.php" method="POST" class="needs-validation" novalidate>
                    <div class="modal-body">
                           
                            <div class="form-group row">
                                <label for="nombre" class="col-md-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                    <div class="invalid-feedback">Ingrese un Nombre</div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-dark col-12">Enviar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <?php include("includes/footer.php") ?>

<script>
    $(document).ready(function(){
        $('#dtcli2').DataTable();
    });

</script>