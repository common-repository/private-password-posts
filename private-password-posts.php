<?php
/*
Plugin Name: Private Password Posts
Plugin URI:   https://tooltips.org/
Description: Private Password Posts
Version: 1.5.0
Author: https://tooltips.org/
Author URI: https://tooltips.org/ 
Text Domain: tomas-private-password-posts
License: GPLv3 or later 
*/
/*  Copyright 2016 - 2022 Tomas Zhu
 This program comes with ABSOLUTELY NO WARRANTY;
 https://www.gnu.org/licenses/gpl-3.0.html
 https://www.gnu.org/licenses/quick-guide-gplv3.html
 */
if (!defined('ABSPATH'))
{
	exit;
}

function tomas_bypass_password_posts( $where = '' ) 
{
	if (!is_single() && !is_admin()) 
	{
		$where .= " AND post_password = ''";
	}
	return $where;
}
add_filter( 'posts_where', 'tomas_bypass_password_posts' );

function tomas_bypass_private_posts( $where = '' ) 
{
	if (!is_single() && !is_admin()) 
	{
		$where .= " AND post_status <> 'private'";
	}
	return $where;
}

add_filter( 'posts_where', 'tomas_bypass_password_posts' );
add_filter( 'posts_where', 'tomas_bypass_private_posts' );

function tomas_get_the_password_form( $post = 0 ) 
{
	$tomas_word_private_password_posts = get_option('tomas_word_private_password_posts');
	if (empty($tomas_word_private_password_posts))
	{
		$tomas_word_private_password_posts = "__( 'This content is password protected. To view it please enter your password below:' )";
	}
	$post   = get_post( $post );
	$label  = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
	$output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<p>' . $tomas_word_private_password_posts . '</p>
	<p><label for="' . $label . '">' . __( 'Password:' ) . ' <input name="post_password" id="' . $label . '" type="password" size="20" /></label> <input type="submit" name="Submit" value="' . esc_attr_x( 'Enter', 'post password form' ) . '" /></p></form>
	';

	return $output;
}

add_filter( 'the_password_form', 'tomas_get_the_password_form', 10 ,1 );

function tomas_private_posts_menu()
{
	add_menu_page(__('Private Post', 'tomas-private-password-posts'), __('Private Post', 'tomas-private-password-posts'), 10, 'bbpronewuserapprovedsettings', 'tomas_private_posts_menu_setting');
	add_submenu_page('tomasprivatepostssettings', __('Private Post','tomas-private-password-posts'), __('Private Post','tomas-private-password-posts'), 10, 'bbpronewuserapprovedsettings', 'tomas_private_posts_menu_setting');
}

add_action('admin_menu', 'tomas_private_posts_menu',12);


function tomas_private_posts_menu_setting()
{
	global $wpdb, $wp_roles;

	if (isset ( $_POST ['tomas_word_private_password_posts_sbumit'] )) {
		if (isset ( $_POST ['tomas_word_private_password_posts'] ))
		{
			//1.4.0
		    $tomas_word_private_password_posts = sanitize_text_field($_POST ['tomas_word_private_password_posts']);
		    // $tomas_word_private_password_posts = $_POST ['tomas_word_private_password_posts'];
			update_option('tomas_word_private_password_posts',$tomas_word_private_password_posts);
		}
		echo "<br />";
	}
	?>

<div style='margin: 10px 5px;'>
	<div style='padding-top: 5px; font-size: 22px;'>Private Post Settings:</div>
</div>
<div style='clear: both'></div>
<div class="wrap">
	<div id="dashboard-widgets-wrap">
		<div id="dashboard-widgets" class="metabox-holder">
			<div id="post-body">
				<div id="dashboard-widgets-main-content">
					<div class="postbox-container" style="width: 90%;">
						<div class="postbox">
							<h3 class='hndle' style='padding: 10px; !important'>
									<?php
	                               echo __ ( 'Private Post Panel:', 'tomas-private-password-posts' );
	                                  ?>
							</h3>

							<div class="inside" style='padding-left: 10px;'>
								
								<form id="bpmoform" name="bpmoform" action="" method="POST">
									<table id="bpmotable" width="100%">
										<tr style="margin-top: 10px;">
										<td width="90%" style="padding: 10px;" valign="top">
										<?php
										//1.5.2
										echo __ ( 'Replace default words of private post:', 'tomas-private-password-posts' );
										?>
										</td>
										</tr>
										<tr style="margin-top: 10px;">
										<?php
										/*
										//1.5.2
										<td width="30%" style="padding: 20px;" valign="top">
										echo __ ( 'Replace default words of private post:', 'tomas-private-password-posts' );
										</td>
										*/
	                                       ?>
											<td width="90%" style="padding: 10px;">
										<?php
										$tomas_word_private_password_posts = get_option('tomas_word_private_password_posts');
										//1.5.0
										
										echo '<input type="text" name="tomas_word_private_password_posts" value="' . esc_attr($tomas_word_private_password_posts) . '" size="100" />';
										
// echo '<input type="text" name="tomas_word_private_password_posts" value="' . $tomas_word_private_password_posts . '" size="100" />';
	?>
										</i>
												</p>
											</td>
										</tr>
									</table>
									<br />
	<input type="submit" id="tomas_word_private_password_posts_sbumit" name="tomas_word_private_password_posts_sbumit" value=" Submit " style="margin: 1px 20px;">
								</form>

								<br />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="clear: both"></div>
<br />
<?php
}

