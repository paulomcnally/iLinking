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
<title><?php echo $webName; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="smssocial.css" rel="stylesheet" type="text/css">
<style type="text/css">body{font-size:12px;}</style>
<script type="text/javascript" src="http://mcnallydevelopers.com/mcnallydevelopers.com/cdn/jquery/jquery.js"></script>
<script type="text/javascript" src="http://mcnallydevelopers.com/mcnallydevelopers.com/cdn/show.js"></script>
<script type="text/javascript" src="http://mcnallydevelopers.com/mcnallydevelopers.com/cdn/jquery/plugin/jquery.numeric.js"></script>
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
							<div id="title">SMS Recientes <?php if( is_login() ): ?>(Env&iacute;a tus mensajes al <span style="color:#F00;">86872162</span>)<?php endif; ?></div>
                            <div align="center" class="adsense_index">
                            <script type="text/javascript"><!--
							google_ad_client = "ca-pub-9262159992567637";
							/* iLinking */
							google_ad_slot = "4068410892";
							google_ad_width = 468;
							google_ad_height = 60;
							//-->
							</script>
                            <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
							</script>
                            </div>
							<div id="ls_co"></div>
                           
                        </div>
					</div>
				</div>
        	</div>
        </div>
    </div>
    <div id="footer">McNally Developers &copy; <?php echo date("Y"); ?> | <a href="privacy.php">Privacidad</a></div>
<script type="text/javascript">
$(document).ready(function(){
	$("#mobile").focus();
	$("#mobile").numeric();
	$("#add").click(function(){ ss.phone(); });
	ss.ls();
	setInterval(function(){ ss.ls(); },10000);
	//show.notificacion('El servicio estar&aacute; inactivo hasta el d&iacute;a Lunes 25 de Abril del 2011');
});
</script>
<script type="text/javascript">var _gaq=_gaq || [];_gaq.push(['_setAccount', 'UA-9369055-12']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:' ==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>
</body>
</html>
