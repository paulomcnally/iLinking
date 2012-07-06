<?php
ob_start();
require '../../../require.php';
require '../facebook.php';

$appId='190309891004093';
$appSecret='5d60393b29c2784ac379bd95e18f1464';
$appUrl='http://apps.facebook.com/ilinkingpages/';
$scope="publish_stream,offline_access,manage_pages";

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret,
  'cookie' => true,
));

// We may or may not have this data based on a $_GET or $_COOKIE based session.
//
// If we get a session here, it means we found a correctly signed session using
// the Application Secret only Facebook and the Application know. We dont know
// if it is still valid until we make an API call using the session. A session
// can become invalid if it has already expired (should not be getting the
// session back in this case) or if the user logged out of Facebook.
$session = $facebook->getSession();

$me = null;
// Session based API call.
if ($session) {
  try {
    $uid = $facebook->getUser();
    $me = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}

// login or logout url will be needed depending on current user state.
if ($me) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array('req_perms'=> $scope));
}

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Facebook</title>
  </head>
  <body>
    <!--
      We use the JS SDK to provide a richer user experience. For more info,
      look here: http://github.com/facebook/connect-js
    -->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId   : '<?php echo $facebook->getAppId(); ?>',
          session : <?php echo json_encode($session); ?>, // don't refetch the session when PHP already has it
          status  : true, // check login status
          cookie  : true, // enable cookies to allow the server to access the session
          xfbml   : true // parse XFBML
        });

        // whenever the user logs in, we refresh the page
        FB.Event.subscribe('auth.login', function() {
          window.location.reload();
        });
      };

      (function() {
        var e = document.createElement('script');
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
<?php
if (!$me)
	{
header("Location: ".$loginUrl);
exit();
	}
?>    
<?php if ( isset( $_SESSION[$GLOBALS['us']] ))
	{
	$facebook_A = array( "id"=>$uid, "access_token"=>$session["access_token"], "sig"=>$session["sig"], "name"=>$me["name"], "registered"=>get_now(), "uid"=>$_SESSION[$GLOBALS['us']] );
	$saved = mysql_replace( $facebook_A, "facebook_pages" );
	if( $saved->status )
		{
		header("Location: ".$url_site."social.php");
		exit();
		}
	}
?> 
  </body>
</html>
<?php
ob_end_flush();
?>