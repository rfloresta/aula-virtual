      <?php
      header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_de_estudiantes.xls");
session_start();
  $listaEstu=$_SESSION['listaEstuCom'];
 
   $fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
    
  foreach ($listaEstu as $IndiceE => $valEstu){}

$html='
<!DOCTYPE html>
<html lang="es">
    <head>
       <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
    </head>
    <body>
 <center><h1>Institución Educativa Particular Carl Palmer</h1></center>
 <H2> Año escolar: '.$año.'</H2>
	<table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
                    <tr>
                       <th colspan="11">LISTADO DE ESTUDIANTES</th>
                 </tr>
		<tr>
					
				   
						
					<th>Estudiante</th>
                                        <th>Dni</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th>Distrito</th>
                                        <th>Usuario</th>
                                        <th>Dirección</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                        <th>E-mail</th>
					<th>Estado</th>
                                        
                                       
		</tr>
		</thead>
		<tbody>';
	
	foreach ($valEstu as $estu) { 
           $foto=$estu['FOTO'];
                if($foto==null){
               $foto="nodisponible.png";
                }
                
              $estado=$estu['ESTADO'];
              if($estado=="A"){
                  $esta='Activo';
              }else {
                  $esta='Inactivo';
              }
              
               $sexo=$estu['SEXO'];
             
         
		$html.='<tr>
             
		<td>'.$estu['ESTUDIANTE'].'</td>></td>
                 <td>'.$estu['DNI'].'</td>                 
                 <td>'.$sexo.'</td> 
	     
                <td>'.$estu['EDAD'].'</td>
                    <td>'.$estu['DISTRITO'].'</td> 
                        <td>'.$estu['USUARIO'].'</td> 
                <td>'.$estu['DIRECCION'].'</td> 
                <td>'.$estu['CEL'].'</td> 
                <td>'.$estu['TEL'].'</td> 
                <td>'.$estu['EMAIL'].'</td> 
	        <td>'.$esta.'</td>
                 
               
                        
		</tr>';
        }
	
       $html.='         
	</table>
	

    </body>
</html>';

echo $html;
