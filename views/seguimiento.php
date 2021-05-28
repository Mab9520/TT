<!DOCTYPE html>

<?php
include('../includes/funciones.php');
$conexion = conexion("root", "");

$tmp = array();
$res = array();
$id_estudiante = $_GET['id'];

$sel = $conexion->query("SELECT * FROM filesest WHERE id_estudiante = '$id_estudiante'");
while ($row = $sel->fetch(PDO::FETCH_ASSOC)) {
    $tmp = $row;
    array_push($res, $tmp);
}
?>
<?php


$tmpesp = array();
$resesp = array();

$selesp = $conexion->query("SELECT * FROM files WHERE id_estudiante = '$id_estudiante'");
while ($rowesp = $selesp->fetch(PDO::FETCH_ASSOC)) {
    $tmpesp = $rowesp;
    array_push($resesp, $tmpesp);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h1>Seguimiento</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-8">

                    <table class="table mt-2">
                        <thead>
                            <tr>
                              
                                <th scope="col">Actividad del especialista</th>
                                <th scope="col">Actividad del estudiante</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resesp as $valesp) { ?>
                                <tr>
                                    
                                    <td>
                                        <button onclick="openModelPDFEsp('<?php echo $valesp['url'] ?>')" class="btn btn-primary" type="button">Ver Archivo </button>
                                    </td>
                                    <?php } ?>
                                    <?php foreach ($res as $val) { ?>
                                    <td>
                                        <button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary" type="button">Ver Archivo </button>
                                    </td>
                                    <td><?php echo $val['description'] ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
                            
                            function openModelPDF(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/TT/subir/'; ?>'+url);
                            }
                            function openModelPDFEsp(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/TT/subir/'; ?>'+url);
                            }
        </script>

    </body>
</html>
