<!DOCTYPE html>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/conx.php');

	$id = mysqli_real_escape_string($link, $_GET['id']);
    $titulo = mysqli_real_escape_string($link, $_GET['title']);
	$query="SELECT * FROM notas_prensa WHERE id = ". mysqli_real_escape_string($link, $id) ." limit 0,1";
	
	$result=mysqli_query($link,$query);
	$row = mysqli_fetch_object($result);

?>
<html lang="es">
<head>
<title>.:: SEDIR ::.</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="https://www.sedir.org.pe/css/style.css" />
<link rel="icon" href="https://sedir.org.pe/assets/img/favicon.png" type="image/x-icon">
<meta name="keywords" content="">
<meta name="description" content="">
    <!-- Open Graph -->
		<meta property="og:type" content="article"> 
		<meta property="og:site_name" content="sedir.org.pe"> 
		<meta property="og:title" content="<?php echo $row->titulo; ?>"> 
		<meta property="og:description" content="<?php echo substr(strip_tags($row->detalle_noti), 0, 130) ;?>">
		<meta property="og:url" content="https://sedir.org.pe/noticia/<?php echo $id;?>/<?php echo $titulo;?>"> 
		<meta property="og:image" content="<?php echo $row->img_noti; ?>">
		<meta content="100134106679300" property="fb:admin">
		<meta content="473245603047221" property="fb:app_id">
	<!-- fin Open Graph --> 
<link rel='stylesheet' id='superhero-carrois-gothic-css' href='https://fonts.googleapis.com/css?family=Carrois+Gothic&ver=4.4.1-alpha-36109' type='text/css' media='all' />
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
    
<!--EFECTO HIGHSLIDE DE IMAGENES-->  
<script type="text/javascript" src="../highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="../highslide/highslide.css" />  
<script type="text/javascript">
hs.graphicsDir = '../highslide/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
//hs.dimmingOpacity = 0.75;
// Add the controlbar
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: .75,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script>
    
    
    
 <style>    
     .notitex{
        color: #5b6d5a;
        font-size: 14px;
        font-family: 'Roboto', sans-serif, Arial;
        text-align: justify;
        line-height: 22px;
     }
    .notitex img{
        max-width:600px;
        border: 1px solid #A9A8A8;
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
<div id="fb-root"></div><!--app facebook plugin pagina-->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=473245603047221";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>    
    
    
<div id="boxed_layout">
	<div id="top_bg">
		<?php include ("../header.php") ?>
         <div style="width: 100%; margin: auto; margin-left: -10px; clear: both; background: url(https://sedir.org.pe/slide/images/shadow_top.png) no-repeat top center;
    padding: 30px 0 0 0;
"></div> 

					
		<section style="width:1080px; background-color: #FFF;margin: auto;">

            <div class="">
            <div class="noti-detallee" >
                <div style="width:60%; padding:8px; ">
                    <div style="display:flex; justify-content:space-between;">
                        <div> 
                            <div style="padding:15px 0; ">
                                 <img src="https://www.sedir.org.pe/imgs/T-noticias.jpg" alt="">
                            </div>
                        </div> 
                        <div> 
                            <a href="https://www.sedir.org.pe/" target="_self">
                                <div style="padding:15px; "><img src="https://www.sedir.org.pe/imgs/volver.jpg" alt=""></div>
                            </a>
                        </div>                        
                    </div> 
                    
                    
                         
                    <!-- Your share button code -->
                  <div class="fb-share-button" 
                    data-href="https://sedir.org.pe/noticia/<?php echo $id;?>/<?php echo $titulo;?>" 
                    data-layout="button_count" data-size="large">
                  </div>                     

                    <div style="padding:15px 0 0 0; ">
                       
                        <div class="notitex" style="font-size: 12px;"><?php 
                            $fecha = date_create_from_format('Y-m-d', $row->fecha);
                            echo date_format($fecha, 'd-m-Y')?>
                        </div>
                    </div>
                            <strong class="notitit"><?php echo $row->titulo; ?></strong>
                            
                            <p class="notitex"><?php echo $row->copete_bajada; ?></p>
                    
                    <div style="padding:15px 0 0 0; ">
<!--                        <img src="imgs/noti02-grande.jpg" alt="" width="600">-->
                        <img src="<?php echo $row->img_noti; ?>" style="width:600px; overflow:hidden;border: 1px solid #A9A8A8;">
                    </div>
                    
                    
                    <div style="padding:15px 0 0 0; ">
                        <div class="notitex"><?php echo $row->detalle_noti; ?></div>
                    </div>
            <?php
            ///INCREMENTAR DONTADOR DE IMPRESIONES     
              $visitas = $row->impresiones+1;
              
              $intro = "UPDATE `notas_prensa` SET impresiones= '$visitas' WHERE id= '$id'";

              mysqli_query($link, $intro) or die('<b>No puedes meter Datos</b>');                     
                    
                    
             ?>
 
   <!-- Your share button code -->
  <div class="fb-share-button" 
    data-href="https://sedir.org.pe/noticia/<?php echo $id;?>/<?php echo $titulo;?>" 
    data-layout="button_count" data-size="large">
  </div>                                      
      
        	     </div>
                <!-- pag face COLUMNA RIGHT-->
                 <div style="width:40%; padding:8px; " >
                    <div class="fb-page" data-href="https://www.facebook.com/SEDIR.Agro" data-tabs="timeline" data-width="380" data-height="1010" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/www.sedir.org.pe/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/www.sedir.org.pe/">Servicio para el Desarrollo Integral Rural - SEDIR</a></blockquote></div>
                </div>
                
            </div>
              
            
            </div>

		</section>
		
		
		<!--footer-->	
			<?php  include ("../footer.php") ?>
		<!--fin de footer-->		

			

	</div>
</div>
    <script src="https://www.sedir.org.pe/js/over.js" type="text/javascript"></script>
    <script src="https://www.sedir.org.pe/js/idioma.js" type="text/javascript"></script>
</body>
</html>