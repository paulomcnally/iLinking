<?php
require 'require.php';
if( !is_login() )
	{
	no_login_message();
	}
$phone = phone_list( $_SESSION[$us] );
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
<title>Tel&eacute;fono - <?php echo $webName; ?></title>
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
							<div id="title"><img src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/newsletter/cdn/phone.png" align="absmiddle" alt="Phone"/>Agrega tu n&uacute;mero celular</div>
                            <table class="table_container table_container_clean">
                            	<tr>
                                	<td class="caption"> <span class="atk">*</span> Celular:</td>
                                    <td class="content">
                                    <input class="text" type="text" id="mobile" name="mobile" value="505">
                                    </td>
                                </tr>
                                <tr>
                                	<td class="caption">&nbsp;
                                    
                                    </td>
                                    <td class="content">
                                    <input class="button" type="button" value="Agregar" id="add" name="add">
                                    </td>
                                </tr>
                            </table>
                            <?php if( count( $phone ) > 0 ): ?>
                            <div id="title">Mis N&uacute;meros registrados</div>
                            <table class="table_container table_container_clean">
                            	<tr>
                                	<td><strong>Celular:</strong></td>
                                    <td><strong>Registrado:</strong></td>
                                </tr>
                                <?php foreach( $phone as $phon ): ?>
                                <tr>
                                	<td>
                                    <?php echo $phon->phone; ?>
                                    </td>
                                    <td>
                                    <?php echo $phon->registered; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php endif; ?>
                            <div id="m_f">Este n&uacute;mero sera con el que envies tus SMS.</div>
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
});
</script>
<script type="text/javascript">var _gaq=_gaq || [];_gaq.push(['_setAccount', 'UA-9369055-12']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:' ==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>
</body>
</html>
