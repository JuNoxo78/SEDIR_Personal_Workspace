<!DOCTYPE html>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/conx.php'); ?>
<html lang="es">
<head>
<title>.:: SEDIR ::.</title>
<meta charset="utf-8" />

<link rel="icon" href="https://sedir.org.pe/assets/img/favicon.png" type="image/x-icon">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel='stylesheet' id='superhero-carrois-gothic-css' href='https://fonts.googleapis.com/css?family=Carrois+Gothic&ver=4.4.1-alpha-36109' type='text/css' media='all' />
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    
 <style>    
     .notitex, a:link{
        color: #5b6d5a;
        font-size: 14px;
        font-family: 'Roboto', sans-serif, Arial;
        line-height: 17px;
         text-decoration: none;
         
     }
     .notitit{
        padding: 0 0 6px 0;
        font-weight: bolder;
        color: #5f7d5d;
        font-size: 19px;
        font-family: Carrois Gothic;
        line-height: 20px;
     }
      .notidate{
        color: #869686;
        font-size: 13px;
        font-family: 'Roboto', sans-serif, Arial;
        line-height: 18px;
     }   
     .noti-detallee{
        width: 1050px;
        display: flex;
        margin: auto;
        box-sizing: border-box;
        padding: 0 0 20px;
     }   
 </style>     
</head>
	
<body>

					
            <div class="vc_gris_noticias" >
                <div style="display:flex; flex-direction:column; justify-content:space-between; width:60%; padding:8px; " >
                     <div style="overflow:hidden; padding: 0 0 10px;" >
                         <img src="https://www.sedir.org.pe/noticias/imgs/title_ultimasnoti.jpg" height="35" width="654" alt="">
                     </div>
                    
 <?php
	$sql="SELECT * FROM notas_prensa WHERE act = 1 ORDER BY id DESC limit 0,3";
	$result=mysqli_query($link,$sql);
	
	while($row = mysqli_fetch_object($result)){ //OJO si es object va ' $row->... '
              //formatear campo tipo 'date' de phpmyadmin a normal
              $fecha = date_create_from_format('Y-m-d', $row->fecha);
              @$idd= $row->id;
              @$title= $row->titulo; 
              @$titulo= urls_amigables($title);
 ?>
  <!-- *****************************************************************************-->        
                     <div style="display: flex;" > 
                         <a href="noticias/noticias/noticia-detalle.php">
                            <div style="padding: 0 10px 10px 0; "> 
                               <a href="/noticia/<?php echo $idd;?>/<?php echo $titulo;?>">  <!-- ***antes:*<a href="noticia-detalle.php?id=1212;"> *****--> 
                                    <img src="<?php echo $row->img_noti; ?>" height="153" width="223" alt="">   
                               </a> 
                            </div>
                         </a>     
                        <div style="padding: 0 0 10px 0; "> 
                             <a href="/noticia/<?php echo $idd;?>/<?php echo $titulo;?>">  <!-- ***antes:*<a href="noticia-detalle.php?id=1212;"> *****--> 
                                 <div class="notitit" style="padding: 0 0 6px 0; "><?php echo $row->titulo; ?>
                                 </div>
                             </a>  
                             <div class="notidate" style="padding: 0 0 6px 0; "><span><?php echo date_format($fecha, 'd-m-Y'); ?></span>| Area de prensa</div>
                            <a href="/noticia/<?php echo $idd;?>/<?php echo $titulo;?>">  <!-- ***antes:*<a href="noticia-detalle.php?id=1212;"> *****--> 
                             <div class="notitex">
                                <?php echo substr(strip_tags($row->detalle_noti), 0, 130) ;?>....
                             </div>
                            </a>        
                        </div>
                     </div>
  <!-- *****************************************************************************--> 
<?php
		
	}
	mysqli_close($link);
                            //////////URLS AMIGABLES ////////
                            function urls_amigables($url) {
                                // Tranformamos todo a minusculas
                                $url = mb_strtolower($url);
                                
                                //Rememplazamos caracteres especiales latinos
                                $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
                                $repl = array('a', 'e', 'i', 'o', 'u', 'n');
                                $url = str_replace ($find, $repl, $url);
                                
                                // Añaadimos los guiones
                                $find = array(' ', '&', '\r\n', '\n', '+');
                                $url = str_replace ($find, '-', $url);
                                
                                // Eliminamos y Reemplazamos demás caracteres especiales
                                $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
                                $repl = array('', '-', '');
                                $url = preg_replace ($find, $repl, $url);
                                
                                return $url; 
                            }


?> 
                    <a href="https://www.sedir.org.pe/noticias/noticias-lista.php">
                        <div style="padding:0 5px 15px; text-align:right;">
                            <img src="https://www.sedir.org.pe/noticias/imgs/vermas.jpg" alt="">
                        </div>   
                    </a>
                </div> 
                
                
                <div style="width:40%; padding:8px; " >
                    <div class="fb-page" data-href="https://www.facebook.com/SEDIR.Agro" data-tabs="timeline" data-width="380" data-height="550" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/www.sedir.org.pe/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/www.sedir.org.pe/">Servicio para el Desarrollo Integral Rural - SEDIR</a></blockquote></div>
                </div>               

			

	</div>

</body>
</html>