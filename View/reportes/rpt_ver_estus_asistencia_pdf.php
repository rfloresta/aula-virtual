    <?php
           session_start();
       require_once '../../Public/dompdf/dompdf_config.inc.php';
$lista=$_SESSION['listaCantidadA'];
$nombre_estu=$_SESSION['nombre_estu'];
  $año=$_SESSION['anio_selec']; 
  $lista_clase=$_SESSION['listaMiClase']; 
foreach ($lista as $Indice => $val){}
$html='
<html>
    <head>
  
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
<center><h1>Institución Educativa Particular Carl Palmer</h1></center>
   <h2>Año escolar: '.$año.'</span><br></h2>
<h3>Salón de Clase: '.$lista_clase['MICLASE'][0]['CLASE'].'<br>
Estudiante: '.$nombre_estu.'</h3><br>

                      <table border="1" cellspacing="0"  cellspandding="0"  width="100%">

		<thead>
		<tr>
					<th>Curso</th>
                                        <th >Asistencias</th>
					<th >Faltas</th>
                                        <th >Tardanzas</th>
                                       
		</tr>
		</thead>
		<tbody>';
	     

	foreach($val as $val2){
		$html.='<tr>
                    <td>'.$val2['CURSO'].'</td>           
		    <td>'.$val2['A'].'</td>
                    <td>'.$val2['F'].'</td> 
	            <td>'.$val2['T'].'</td> 
                
		</tr>';
      
            } 
	$html.='
		</tbody>
            
	</table>
        

    </body>
</html>';

$dompdf=new DOMPDF();
$dompdf->load_html($html);
ini_set("memory_limit", "128M");
$dompdf->render();
$dompdf->stream("reporte_de_asistencias_estudiante.pdf");


?>
