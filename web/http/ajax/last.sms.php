<?php
require '../require.php';
date_default_timezone_set("America/Managua");
$results = $mysql->results("SELECT S.sms_id, U.nick, U.email, S.sms_text, S.start_dt, (SELECT CONCAT('http://www.facebook.com/',F.id,'/posts/',D.result) FROM detail D, facebook F WHERE D.id = S.sms_id AND F.uid = P.uid AND D.`type`='FB') AS FB, (SELECT CONCAT('http://twitter.com/',T.id,'/status/',D.result) FROM detail D, twitter T WHERE D.id = S.sms_id AND T.uid = P.uid AND `type`='TW') AS TW
FROM sms S, users U, phones P
WHERE S.sms_sender = P.phone
AND U.uid = P.uid
AND S.sms_type = 'received'
AND S.keyword_id NOT IN(6)
ORDER BY S.sms_id DESC
LIMIT " . $last_sms_limit);

function a($s){return preg_replace('/@(\w{1,})/','@<a href="http://twitter.com/#!/$1" target="_blank">$1</a>',$s);}
function b($s){return preg_replace('/#(\w{1,})/','<a href="http://twitter.com/#!/search?q=%23$1" target="_blank">#$1</a>',$s);}
function c($s){return a(b(html_entity_decode(utf8_encode($s))));}

if( $mysql->num_rows > 0 )
	{
	foreach( $results as $row )
		{
		if( isset( $FB ) ){ unset( $FB ); }
		if( isset( $TW ) ){ unset( $TW ); }
		$FB = new stdClass;
		$TW = new stdClass;
		if(isset($row->FB)){$FB->is_valid_post=true;$FB->url = $row->FB;}else{$FB->is_valid_post=false;}
		if(isset($row->TW)){$TW->is_valid_post=true;$TW->url = $row->TW;}else{$TW->is_valid_post=false;}
		?>
        <table width="100%" border="0" cellspacing="1" cellpadding="1" style="border-bottom:1px solid #CCC;">
  			<tr>
    			<td style="width:48px;">
                	<img src="http://gravatar.com/avatar/<?php echo md5($row->email); ?>?s=48&d=&r=G" alt="<?php echo $row->nick; ?>"  />
                </td>
    			<td valign="top" style="padding-left:8px; font-size:13px;">
                	<a style="color:#2276BB; font-weight:bold;" href="#"><?php echo $row->nick; ?></a> <?php echo c($row->sms_text); ?> <?php if( $TW->is_valid_post ): ?><a href="<?php echo $TW->url; ?>" target="_blank"><img src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/social_twitter_box_blue-1.png" align="absmiddle" alt="Twitter" border="0" /></a><?php endif; ?> <?php if( $FB->is_valid_post ): ?><a href="<?php echo $FB->url; ?>" target="_blank"><img src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/social_facebook_box_blue-1.png" align="absmiddle" alt="Facebook" border="0" /></a><?php endif; ?> <a style="font-size:10px; color:#666;" href="#"><?php echo date("F j Y", strtotime( $row->start_dt )); ?> <?php echo date("H:i", strtotime( $row->start_dt )); ?></a>
                </td>
  			</tr>
		</table>
       	<?php
		}
	}
?>