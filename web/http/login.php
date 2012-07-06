<?php
require_once 'require.php';

if( is_login() )
	{
	header("Location: index.php");
	die();
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta property="og:title" content="<?php echo $webName; ?>"/>
<meta property="og:site_name" content="<?php echo $webName; ?>"/> 
<meta property="og:description" content="<?php echo $webContent; ?>"/>
<meta property="og:image" content="<?php echo $webImage; ?>" /> 
<meta property="og:url" content="<?php echo $url_site; ?>"/> 
<meta property="fb:admins" content="595627236" /> 
<meta property="fb:app_id" content="<?php echo $appId; ?>" />
<title>Inisio de sesi&oacute;n - <?php echo $webName; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="smssocial.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://mcnallydevelopers.com/mcnallydevelopers.com/cdn/jquery/jquery.js"></script>
<script type="text/javascript" src="http://mcnallydevelopers.com/mcnallydevelopers.com/cdn/show.js"></script>
<script type="text/javascript" src="smssocial.js"></script>
<style type="text/css">body{font-size:12px;}</style>
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
							<div id="title">Ingrese los datos de cliente</div>
                            <table class="table_container table_container_clean">
                            	<tr>
                                	<td class="caption"><span class="atk">*</span> Correo electr&oacute;nico:</td>
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
                                    <input class="button" type="button" value="Acceder" id="login" name="login">
                                    </td>
                                </tr>
                            </table>
                            <div id="m_f">Si a&uacute;n no estas registrado, puedes registrarte dando un click <a href="singup.php">aqu&iacute;</a>.</div>
                        </div>
					</div>
				</div>
        	</div>
        </div>
    </div>
    <div id="footer">McNally Developers &copy; <?php echo date("Y"); ?> | <a href="privacy.php">Privacidad</a> | <a href="singup.php">Registrarse</a></div>
<script type="text/javascript">
$(document).ready(function(){$("#login").click(function(){ss.login();})
$("#email").focus();
});
</script>
<script type="text/javascript">var _gaq=_gaq || [];_gaq.push(['_setAccount', 'UA-9369055-12']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:' ==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>
</body>
</html>
