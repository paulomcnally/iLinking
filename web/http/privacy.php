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
<title>Privacidad de datos - <?php echo $webName; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="smssocial.css" rel="stylesheet" type="text/css">
<style type="text/css">body{font-size:12px;} div.cnt{padding:0 10px;text-align:justify; margin:10px 0;}</style>
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
							<div id="title">Privacidad de datos</div>
							<div class="cnt">
                            	&Uacute;ltima modificaci&oacute;n: 18 de Marzo de 2011
                            </div>
                            <div class="cnt">
                            	Managua - Nicaragua
                            </div>
                            <div class="cnt">
                            	Esta Pol&iacute;tica de privacidad se aplica a todos los productos, servicios de <strong>iLinking</strong>.
                            </div>
                            <div class="cnt">
                            	En <strong>iLinking</strong> somos plenamente conscientes de la confianza que los usuarios depositan en nosotros y tenemos la responsabilidad de proteger su privacidad.
                            </div>
                            <div class="cnt">
                            	<strong>Informaci&oacute;n que proporciona el usuario</strong>: El cliente/usuario proporciona informaci&oacute;n personal como nombre, correo electrónico, tel&eacute;fono, estos datos son usados para ponernos en contacto, el pa&iacute;s de procedencia del usuario tambi&eacute;n es guardado en la base de datos de clientes/usuarios. Esta informaci&oacute;n no es compartida con ninguna empresa o persona.
                            </div>
                            <div class="cnt">
                            	<strong>Direcci&oacute;n IP</strong>: De momento ninguno de los servicios que brinda <strong>iLinking</strong> guarda registro de su direcci&oacute;n IP, sin embargo se utiliza para obtener el nombre del pa&iacute;s de procedencia del cliente/usuario.
                            </div>
                            <div class="cnt">
                            	<strong>Informaci&oacute;n delicada</strong>: El servicio "iLinking" guarda informaci&oacute;n importante a como son las sesiones de usuarios en Facebook y Twitter, este dato es guardado y resguardado por m&eacute;todos de seguridad inform&aacute;tica para que los cibernautas no puedan obtener esta informaci&oacute;n.
                            </div>
                             <div class="cnt">
                            	<strong>Visitas hacia los sitios</strong>: Todas las p&aacute;ginas de <strong>iLinking</strong> usan el servicio de <strong>Google Inc</strong>. <strong>Google Analytics</strong> y este guarda un registro de su visita.
                            </div>
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
