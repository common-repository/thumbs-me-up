<?php

/*
Plugin Name: Thumbs Me Up!
Plugin URI: http://www.techytuts.com/uncategorized/wordpress-plugin-thumbs-me-up.html
Description: This plugin adds a small thumbs me up appeal (in a blockquote) with a StumbleUpon Thumbs up button to all your visitors that come to your site from StumbleUpon. Visitors from other websites are not shown this button. You can see it working here http://www.stumbleupon.com/url/www.techytuts.com/, Make sure you visit the website from a stumbleupon page.
Author: Mohd Ameenuddin Atif
Version: 0.1
Author URI: http://www.techytuts.com/
*/

add_filter('the_content', 'check_ref');

// get_option('siteurl')

function check_ref($content)
{

$referrer = $_SERVER['HTTP_REFERER'] ;

$subject = "$referrer";
$pattern = '/stumbleupon/';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
$number = count($matches);
$output = "";

if ($number > 0 ) {
$output ="
<blockquote>
Hey there! It seems that you have come to my website from StumbleUpon. If you like this page please consider giving it a Thumbs Up. Thanks !!<br><br>
<script language=JavaScript>
document.write ('<a href=\"');
document.write('http://www.stumbleupon.com/submit?url='+document.URL+'&title='+document.title.replace(/ /g,'+')+'\">');
document.write ('<img style=\"margin-bottom: 0px;\" border=0 src=\"http://cdn.stumble-upon.com/images/120x20_thumb_black.gif\"></a>');
</script> 
</blockquote>
";
}

return $output.$content;
}
?>