<?php
require '../require.php';
date_default_timezone_set("America/Managua");
$results = $mysql->results("SELECT * FROM vw_lastsms");

function a($s){return preg_replace('/@(\w{1,})/','@<a href="http://twitter.com/#!/$1" target="_blank">$1</a>',$s);}
function b($s){return preg_replace('/#(\w{1,})/','<a href="http://twitter.com/#!/search?q=%23$1" target="_blank">#$1</a>',$s);}
function c($s){return a(b(html_entity_decode(utf8_encode($s))));}

if( $mysql->num_rows > 0 )
	{
	foreach( $results as $row )
		{
		if( isset( $FB ) ){ unset( $FB ); }
		if( isset( $TW ) ){ unset( $TW ); }
		// Facebook
		if(isset($row->FB)){$FB=json_decode($row->FB);
		if(isset($row->FB)){ $id=explode("_",$FB->id); $profile_pic_url = "https://graph.facebook.com/".$id[0]."/picture";};
		if(!isset($FB->error)){$FB->is_valid_post=true;$FB->data=explode("_",$FB->id);$FB->user_id=$FB->data[0];$FB->post_id=$FB->data[1];}else{$FB->is_valid_post=false;}}
		// Twitter
		if(isset($row->TW)){$TW=json_decode(strip_tags($row->TW));
		if(isset($row->TW)){ $profile_pic_url=(isset($TW->user->profile_image_url))?$TW->user->profile_image_url:$profile_pic_url; }
		if(!isset($TW->error)){$TW->is_valid_post=true;if(!isset($TW->user->screen_name)){$TW->is_valid_post=false;}if(!isset($TW->user->id_str)){$TW->is_valid_post=false;}}else{$TW->is_valid_post=false;}}
		
		
		?>
        <table width="100%" border="0" cellspacing="1" cellpadding="1" style="border-bottom:1px solid #CCC;">
  			<tr>
    			<td style="width:48px;">
                	<img src="<?php echo $profile_pic_url; ?>" width="48" height="48" alt="<?php echo $row->nick; ?>"  />
                </td>
    			<td valign="top" style="padding-left:8px; font-size:13px;">
                	<a style="color:#2276BB; font-weight:bold;" href="#"><?php echo $row->nick; ?></a> <?php echo c($row->text); ?> <?php if( $TW->is_valid_post ): ?><a href="http://twitter.com/#!/<?php echo $TW->user->screen_name; ?>/status/<?php echo $TW->id_str; ?>" target="_blank"><img src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/social_twitter_box_blue-1.png" align="absmiddle" alt="Twitter" border="0" /></a><?php endif; ?> <?php if( $FB->is_valid_post ): ?><a href="http://www.facebook.com/<?php echo $FB->user_id; ?>/posts/<?php echo $FB->post_id; ?>" target="_blank"><img src="http://i933.photobucket.com/albums/ad179/mcnallydevelopers/cdn/social_facebook_box_blue-1.png" align="absmiddle" alt="Facebook" border="0" /></a><?php endif; ?> <a style="font-size:10px; color:#666;" href="#"><?php echo date("F j Y", strtotime( $row->start_dt )); ?> <?php echo date("H:i", strtotime( $row->start_dt )); ?></a>
                </td>
  			</tr>
		</table>
       	<?php
		}
	}
?>