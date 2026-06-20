<!DOCTYPE html>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/conx.php'); ?>
<html lang="es">
<head>
<title>.:: SEDIR ::.</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="https://www.sedir.org.pe/css/style.css" />
<link rel="icon" type="image/png" sizes="32x32" href="https://www.sedir.org.pe/favicon_32x32.png">
<link rel="icon" href="https://sedir.org.pe/assets/img/favicon.png" type="image/x-icon">
<meta name="keywords" content="">
<meta name="description" content="">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='//rec.getsmartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '19aa725ffd5a672733a2bb35bb706a0d8655996c');
</script>
</head>
	
<body>

    
    
<div id="boxed_layout">
	<div id="top_bg">
		<?php //include ("header.php") ?>
        <?php include ($_SERVER['DOCUMENT_ROOT'].'/sedirhead/index.html') ?>

         <div style="width: 100%; margin: auto; margin-left: -10px; clear: both; background: url(http://sedir.org.pe/slide/images/shadow_top.png) no-repeat top center; padding: 30px 0 0 0;">
         </div> 

					
    <section style="width:1080px; background-color: #FFF;margin: auto;">

        <div class="noti-detallee" >
            <div class="conte-text" style="width:60%; padding:8px; ">
                <section><!--Noticias-->
                    <div style="overflow:hidden; padding: 32px 0 0;" >
                                <img src="https://www.sedir.org.pe/noticias/imgs/title_ultimasnoti.jpg" height="35" width="654" alt="">
                            </div>
                            
                            <?php
                                $sql1="SELECT * FROM notas_prensa WHERE act = 1 ORDER BY id DESC";
                                $result1=mysqli_query($link,$sql1);
                        
                            while($row1 = mysqli_fetch_object($result1)){ //OJO si es object va ' $row->... '
                                //formatear campo tipo 'date' de phpmyadmin a normal
                                @$fecha1 = date_create_from_format('Y-m-d', $row1->fecha);
                                @$idd= $row1->id;
                                @$title= $row1->titulo; 
                                @$titulo= urls_amigableslista($title);
                            ?>
                            <!-- *****************************************************************************--> 
                            <div class="notitex" style="font-size: 11px;line-height: 20px;"><?php echo date_format($fecha1, 'd-m-Y');?></div>                             
                            

                            <div style="display: flex; border-bottom: 1px solid #d9bebd; padding: 0 0 10px 0;; height: 89px; overflow: hidden; text-overflow: ellipsis;" > 
                                
                                    <div style="padding: 0 20px 10px 0;"> 
                                    <a href="/noticia/<?php echo $idd;?>/<?php echo $titulo;?>">  <!-- ***antes:*<a href="noticia-detalle.php?id=1212;"> *****--> 
                                            <img src="<?php echo $row1->img_noti; ?>" height="85" width="85" alt="" style="height: 85px; object-fit: cover; width: 85px;"> 
                                    </a> 
                                    </div>
                                    
                                    <div style="padding: 0 0 20px 0;"> 
                                        <a href="/noticia/<?php echo $idd;?>/<?php echo $titulo;?>" style="text-decoration: none;">  <!-- ***antes:*<a href="noticia-detalle.php?id=1212;"> *****--> 
                                            <div class="notitit" style="padding: 0 0 6px 0; line-clamp: 3; -webkit-box-orient: vertical; -webkit-line-clamp: 3; display: -webkit-box; line-height: 155%; height: 75px; overflow: hidden;">
                                                <?php echo $row1->titulo; ?>
                                            </div>
                                        </a>  

                                    </div>
                            </div>
                            <!-- *****************************************************************************--> 
                            <?php
                                    
                                }
                                
                                    //////////URLS AMIGABLES ////////
                                    function urls_amigableslista($url) {
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

                </section>
            </div>

            
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/aside.php') ?>

        </div> <!--noti-detallee -->

    </section>
		
		
		<!--footer-->	
	
            <?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php') ?>
		<!--fin de footer-->		


	</div>
</div>
    <script src="https://www.sedir.org.pe/js/over.js" type="text/javascript"></script> 
    <script src="https://www.sedir.org.pe/js/idioma.js" type="text/javascript"></script>      
</body>
</html>