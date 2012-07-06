<?php
require 'require.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta property="og:title" content="<?php echo $webName; ?>"/>
<meta property="og:site_name" content="<?php echo $webName; ?>"/> 
<meta property="og:description" content="<?php echo $webContent; ?>"/>
<meta property="og:image" content="<?php echo $webImage; ?>" /> 
<meta property="og:url" content="<?php echo $url_site; ?>"/> 
<meta property="fb:admins" content="595627236" /> 
<meta property="fb:app_id" content="<?php echo $appId; ?>" />
<title>Preguntas Frecuentes - <?php echo $webName; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="smssocial.css" rel="stylesheet" type="text/css">
<style type="text/css">body{font-size:12px;} div.cnt{padding:0 10px;text-align:justify;}</style>
</head>
<body>
<div id="auxiliar"></div>
	<div id="header"><?php echo $webName; ?>
    <div class="header">
    <?php if( is_login() ): ?>
    <?php foreach( $main as $mn ): ?>
    <?php if( $mn->isLogin ): ?>
    <a href="<?php echo $mn->url; ?>"><?php echo $mn->caption; ?></a>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php else: ?>
    <?php foreach( $main as $mn ): ?>
    <?php if( !$mn->isLogin ): ?>
    <a href="<?php echo $mn->url; ?>"><?php echo $mn->caption; ?></a>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>
    </div>
    <div id="wrapper">
    	<div id="loogin_page">
        	<div class="UIRoundedTransparentBox">
				<div class="UIRoundedTransparentBox_Inner clearfix">
					<div class="UIRoundedTransparentBox_Corner UIRoundedTransparentBox_TL">&nbsp;</div>
					<div class="UIRoundedTransparentBox_Corner UIRoundedTransparentBox_TR">&nbsp;</div>
					<div class="UIRoundedTransparentBox_Corner UIRoundedTransparentBox_BL">&nbsp;</div>
					<div class="UIRoundedTransparentBox_Corner UIRoundedTransparentBox_BR">&nbsp;</div>
					<div class="UIRoundedTransparentBox_Border clearfix">
						<div class="UIInterstitialBox_Container clearfix">
							<div id="title">C&oacute;mo funciona?</div>
							<div class="cnt">
                            	<ul style="list-style-type:decimal;">
                                	<li><a href="singup.php">Registrarte</a> en el sitio.</li>
                                    <li>Guardas tu n&uacute;mero celular <a href="http://movistar.com.ni/" target="_blank">Movistar</a> o <a href="http://www.claro.com.ni/" target="_blank">Claro</a> con el que haras tus env&iacute;os.</li>
                                    <li>Das click en la im&aacute;gen de la red social <a href="http://www.twitter.com" target="_blank">Twitter</a> o <a href="http://www.facebook.com" target="_blank">Facebook</a> y te redireccionar&aacute; a la p&aacute;gina para conceder los permisos para publicar.</li>
                                    <li>Env&iacute;as el mensaje de texto al n&uacute;mero celular 86872162 (Movistar).</li>
                                </ul>
                            </div>
                            <div id="title">Cu&aacute;nto cuesta?</div>
							<div class="cnt">El costo del mensaje de texto es acorde a la empresa de telefon&iacute;a, sin embargo si tienes <a href="http://es.wikipedia.org/wiki/Servicio_de_mensajes_cortos" target="_blank">SMS</a> ilimitados no hay costo alg&uacute;no por no ser una marcaci&oacute;n <a href="http://es.wikipedia.org/wiki/Servicio_de_mensajes_cortos#Mensajes_MT-SM_.28de_llegada_al_tel.C3.A9fono.29_y_MO-SM_.28originados_en_el_tel.C3.A9fono.29" target="_blank">MT</a> (envias tus mensajes a un numero celular).
                            </div>
                            <div id="title">C&oacute;mo funciona?</div>
							<div class="cnt">Un celular <a href="http://www.android.com/" target="_blank">Android</a> <a href="http://developer.android.com/sdk/android-2.2.html" target="_blank">2.2 (Froyo)</a> <a href="http://mytouch.t-mobile.com/" target="_blank">MyTouch 3G</a> con un Chip(Sim) <a href="http://www.movistar.com.ni" target="_blank">Movistar</a>, recibe los mensajes de texto y este los env&iacute;a al sitio www.ilinking.com y obtiene los datos del usuario seg&uacute;n el numero que envi&oacute; el mensaje de texto, hace la(s) publicacion(es) a la(s) cuentas configuradas <a href="http://www.twitter.com" target="_blank">Twitter</a> o <a href="http://www.facebook.com" target="_blank">Facebook</a>.
                            </div>
                            <div id="title">En cuanto tiempo se hacen las publicaciones hacia las redes sociales?</div>
							<div class="cnt">Las publicaciones se hacen al instante que se recibe el mensaje de texto.
                            </div>
                            <div id="title">C&oacute;mo se si se public&oacute; mi mensaje?</div>
							<div class="cnt">Recibiras un SMS con el texto que tu mensaje fue publicado, si tu mensaje no fue publicado el mensaje de texto te explicar&aacute; el por qu&eacute; no fue publicado.</div>
                        </div>
					</div>
				</div>
        	</div>
        </div>
    </div>
    <div id="footer">McNally Developers &copy; <?php echo date("Y"); ?> | <a href="privacy.php">Privacidad</a></div>
<script type="text/javascript">var _gaq=_gaq || [];_gaq.push(['_setAccount', 'UA-9369055-12']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:' ==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>
</body>
</html>
