<?php
require 'require.php';
if( !is_login() )
	{
	no_login_message();
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
<title>Redes Sociales - <?php echo $webName; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="smssocial.css" rel="stylesheet" type="text/css">
<style type="text/css">body{font-size:12px;}</style>
</head>
<body>
<div id="auxiliar"></div>
	<div id="header"><?php echo $webName; ?>
    <div class="header">
    <?php foreach( $main as $mn ): ?>
    <?php if( $mn->isLogin ): ?>
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
							<div id="title"><img src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/connect_to_network.png" align="absmiddle" alt="Social"/> Publica tus SMS en redes sociales</div>
                            <table class="table_container table_container_clean">
                            	<tr>
                                	<td align="center">
                                    <?php if( facebook_exist( $_SESSION[$GLOBALS['us']] ) ): ?>
                                    <a href="<?php echo $url_facebook; ?>"><img border="0" src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/facebook_ok.png" alt="Facebook"/></a>
                                    <?php else: ?>
                                    <a href="<?php echo $url_facebook; ?>"><img border="0" src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/facebook.png" alt="Facebook"/></a>
                                    <?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if( twitter_exist( $_SESSION[$GLOBALS['us']] ) ): ?>
                                    <a href="<?php echo $url_twitter; ?>"><img border="0" src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/twitter_ok.png" alt="Facebook"/></a>
                                    <?php else: ?>
                                    <a href="<?php echo $url_twitter; ?>"><img border="0" src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/twitter.png" alt="Facebook"/></a>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <div id="m_f">Ten cuidado con la discreci&oacute;n de lo que publiques!</div>
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
