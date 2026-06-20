<!DOCTYPE html>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/conx.php'); ?>
<html lang="es">
<head>
<title>.:: SEDIR ::.</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="https://www.sedir.org.pe/css/style.css" />
<link rel="icon" href="https://sedir.org.pe/assets/img/favicon.png" type="image/x-icon">
<meta name="keywords" content="">
<meta name="description" content="">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>

</head>
	
<body>
<div id="fb-root"></div><!--app facebook plugin pagina-->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=473245603047221";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>    
    
<div style="width:36%; padding: 8px 8px 0 20px;;" class="fb-page-container">
        <section><!--face-->
                <div class="fb-page"
                    data-href="https://www.facebook.com/SEDIR.Agro"
                    data-tabs="timeline"
                    data-width="400"
                    data-height=""
                    data-small-header="false"
                    data-adapt-container-width="true"
                    data-hide-cover="false"
                    data-show-facepile="true">
                </div>
            
        </section>  

		<section><!--Noticias-->
            <div style="overflow:hidden; padding: 32px 0 0;" >
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
                      <div style="display: flex; border-bottom: 1px solid #d9bebd; padding: 10px 0; height: 89px; overflow: hidden; text-overflow: ellipsis;" > 
                         
                            <div style="padding: 0 20px 10px 0;"> 
                               <a href="/noticia/<?php echo $idd;?>/<?php echo $titulo;?>">  <!-- ***antes:*<a href="noticia-detalle.php?id=1212;"> *****--> 
                                     <img src="<?php echo $row->img_noti; ?>" height="85" width="85" alt="" style="height: 85px; object-fit: cover; width: 85px;"> 
                               </a> 
                            </div>
                             
                            <div style="padding: 0 0 20px 0;"> 
                                <a href="/noticia/<?php echo $idd;?>/<?php echo $titulo;?>" style="text-decoration: none;">  <!-- ***antes:*<a href="noticia-detalle.php?id=1212;"> *****--> 
                                    <div class="notitit" style="padding: 0 0 6px 0; line-clamp: 3; -webkit-box-orient: vertical; -webkit-line-clamp: 3; display: -webkit-box; line-height: 155%; height: 75px; overflow: hidden;">
                                        <?php echo $row->titulo; ?>
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
                        <div style="padding:0 5px 15px; text-align:right;" class="vermas">
                            <img src="https://www.sedir.org.pe/noticias/imgs/vermas.jpg" alt="">
                        </div>   
                    </a>
		</section>
                    
        <section><!--canal youtube-->
            <div style="padding:0 5px 15px; text-align:right;" class="suscripcioncanal">
                <a href="https://www.youtube.com/channel/UCJXXfE-BCNidYAKdWbyekDQ" target="_blank">
                    <img src="https://www.sedir.org.pe/imgs/VISITA-CANAL.jpg" alt="" style="max-width: 100%;">
                </a>
             </div>   
		</section>
</div> 

  
</body>
</html>