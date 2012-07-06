<?php
require 'require.php';
if( is_login() )
	{
	header("Location: index.php");
	exit();
	}
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
<title>Registro - <?php echo $webName; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="smssocial.css" rel="stylesheet" type="text/css">
<style type="text/css">body{font-size:12px;}</style>
<script type="text/javascript" src="http://mcnallydevelopers.com/mcnallydevelopers.com/cdn/jquery/jquery.js"></script>
<script type="text/javascript" src="http://mcnallydevelopers.com/mcnallydevelopers.com/cdn/show.js"></script>
<script type="text/javascript" src="smssocial.js"></script>
<!--[if IE]>
<style type="text/css">
div > div#auxiliar { position: fixed; left:auto; top:0; width:870px; margin:0; height:40px; z-index:50; }
</style>
<![endif]-->
</head>
<body>
<div id="auxiliar"></div>
	<div id="header"><?php echo $webName; ?>
    <div class="header">
    <?php foreach( $main as $mn ): ?>
    <?php if( !$mn->isLogin ): ?>
    <a href="<?php echo $mn->url; ?>"><?php echo $mn->caption; ?></a>
    <?php endif; ?>
    <?php endforeach; ?>
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
							<div id="title"><img src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/newsletter/cdn/splash_beta_blue.png" align="absmiddle" alt="Beta"/>Ingrese sus datos</div>
                            <table class="table_container table_container_clean">
                            	<tr>
                                	<td class="caption"> <span class="atk">*</span> Nombre Completo:</td>
                                    <td class="content">
                                    <input class="text" type="text" id="name" name="name">
                                    </td>
                                </tr>
                                <tr>
                                	<td class="caption"> <span class="atk">*</span> Nombre de usuario:</td>
                                    <td class="content">
                                    <input class="text" type="text" id="nick" name="nick">
                                    </td>
                                </tr>
                                <tr>
                                	<td class="caption"><span class="atk">*</span> Correo Electr&oacute;nico:</td>
                                    <td class="content">
                                    <input class="text" type="text" id="email" name="email">
                                    </td>
                                </tr>
                                <tr>
                                	<td class="caption"><span class="atk">*</span> Contrase&ntilde;a:</td>
                                    <td class="content">
                                    <input class="text" type="password" id="password" name="password">
                                    </td>
                                </tr>
                                <tr>
                                	<td class="caption">&nbsp;
                                    
                                    </td>
                                    <td class="content">
                                    <input class="button" type="button" value="Registrar" id="register" name="register">
                                    </td>
                                </tr>
                            </table>
                            <div id="m_f">Si ya estas registrado, puedes iniciar sesi&oacute;n dando un click <a href="login.php">aqu&iacute;</a>.</div>
                        </div>
					</div>
				</div>
        	</div>
        </div>
    </div>
    <div id="footer">McNally Developers &copy; <?php echo date("Y"); ?> | <a href="privacy.php">Privacidad</a> | <a href="login.php">Iniciar sesi&oacute;n</a></div>
<script type="text/javascript">
$(document).ready(function(){
	$("#user_name").focus();
	$("#register").click(function(){ ss.reg(); });
	$("#nick").keydown(function(e) {if(!e){e=window.event;}var key = window.event ? e.which : e.keyCode;if(key==32){return false;}});

});
</script>
<script type="text/javascript">var _gaq=_gaq || [];_gaq.push(['_setAccount', 'UA-9369055-12']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:' ==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>
</body>
</html>
