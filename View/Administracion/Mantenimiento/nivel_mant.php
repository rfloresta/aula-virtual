<?php
session_start();
$lista = $_SESSION['listaNivel'];
$opcion = $_SESSION['op'];
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>
<?php if ($opcion == 1) { ?>
    <div class="span3" id="adduser">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Agregar Nivel</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form id="FormMante">
                            <input name="tipo" type="hidden" value="g"/>                                 
                            <div class="control-group">
                                <div class="controls">
                                    <input name="nom" class="input focused" id="focusedInput" type="text" placeholder = "Nombre" required>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">

                                    <input  type="button" onclick="grabar('../../Controlador', 'NivelControlador.php', '2', '1', 'MiAjax')" class="btn btn-success" value="Guardar">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>   			
    </div>
<?php } ?>
<?php if ($opcion == 1 || $opcion == 5) { ?>
    <div class="span6" id="listaTabla">
        <div class="row-fluid">
            <!-- block -->
            <div id="block_bg" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Lista de Niveles</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form>
                            <table class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">


                                <thead>
                                    <tr>

                                        <th>Nivel</th>
                                        <th>Estado</th>
                                        <?php if ($opcion == 1) { ?>   

                                            <th></th>
                                            <th></th>
                                        <?php } ?>   
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($lista as $val2) {
                                        $cod = $val2['nivel_id'];
                                        $estado = $val2['estado'];
                                        if ($estado == "A") {
                                            $estado = "Activo";
                                        } else {
                                            $estado = "Inactivo";
                                        }
                                        ?>
                                        <tr ID="<?PHP echo $cod ?>">

                                            <td><?php echo $val2['nivel_nombre']; ?></td>
                                            <?php if ($opcion == 5) {
                                                echo '<td>' . $estado . '</td>';
                                            } ?>
        <?php if ($opcion == 1) { ?>
                                                <td><input onclick='estado("../../Controlador", "AdminControlador.php", 2, "A", "i", "<?php echo $cod ?>", "nivel")' type="radio" name="<?php echo $cod ?>"  <?php if ($estado == "Activo") echo "checked" ?> />On
                                                    <input onclick='estado("../../Controlador", "AdminControlador.php", 2, "I", "i", "<?php echo $cod ?>", "nivel")' type="radio" name="<?php echo $cod ?>" <?php if ($estado == "Inactivo") echo "checked" ?>/>Off</td>
                                                <td width="40"> <a class="btn btn-danger" href='javascript:accionSimple("../../Controlador","AdminControlador.php",2,"<?php echo $cod; ?>","","e","nivel")'><i class="icon-trash icon-large"></i></a></td>
                                                <td width="40"><a href='javascript:accionSimple("../../Controlador","AdminControlador.php",2,"<?php echo $cod; ?>","adduser","b","nivel")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>

        <?php } ?>    				


                                        </tr>
    <?php } ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nivel</th>
                                        <th>Estado</th>
    <?php if ($opcion == 1) { ?>   

                                            <th></th>
                                            <th></th>
    <?php } ?>   
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>


    </div>
<?php } ?>