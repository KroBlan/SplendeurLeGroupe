<?php
/*
Plugin Name: Kv Simple Subscription
Plugin URI: http://wordpress.org/plugins/kv-simple-subscription/
Description: This plugin helps you to get subscriptions through email and you can get email for every user signup for news letters.
Author: Kvvaradha && KroBlan
Version: 1.0
*/

add_action( 'init', 'kv_register_shortcode_for_newsletter');

function kv_register_shortcode_for_newsletter(){

	add_shortcode('kv_email_subscriptions', 'kv_email_subscription_fn' );
}

class Kv_Subscription_widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'kv_email_subscription',
			'description' => 'A Simple Email Subscription Widget to get subscribers info',
		);
		parent::__construct( 'my_widget', 'Kv Subscriptions', $widget_ops );
	}

	public function widget( $args, $instance ) {
		echo '<aside>';
		do_action('kv_email_subscription');
		echo '</aside>';
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'Kv_Subscription_widget' );
});


if(!function_exists('kv_email_subscription_fn')) {
	add_action('kv_email_subscription' , 'kv_email_subscription_fn' );

	function kv_email_subscription_fn() {

		if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['kv_submit_subscription'])) {

			if( filter_var($_POST['subscriber_email'], FILTER_VALIDATE_EMAIL) ){
        $mysqli = new mysqli("localhost", "root", "root", "splendeur");
        if ($mysqli->connect_errno) {
          echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        if (!$mysqli->query("INSERT INTO wp_newsletters_subscribers(subscriber_email) VALUES ('" . $_POST['subscriber_email'] . "')")) {
        	echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
        }

				$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

				$subject = sprintf(__('New Subscription on %s','kvc'), $blogname);

				$to = get_option('admin_email');

				// $headers = 'From: '. sprintf(__('%s Admin', 'kvc'), $blogname) .' <No-repy@'.$_SERVER['SERVER_NAME'] .'>' . PHP_EOL;
				$headers = array('Content-Type: text/html; charset=UTF-8');

				$message = '<style>body {background-color: blue;}</style>';
				$message .= '<body>';
				$message .= '<h1 style="color: red;">TITRE ROUGE</h1>';
				$message .= sprintf(__('Hi ,', 'kvc')) . PHP_EOL . PHP_EOL;
				$message .= sprintf(__('You have a new subscription on your %s website.', 'kvc'), $blogname) . PHP_EOL . PHP_EOL;
				$message .= __('Email Details', 'kvc') . PHP_EOL;
				$message .= __('-----------------') . PHP_EOL;
				$message .= __('User E-mail: ', 'kvc') . stripslashes($_POST['subscriber_email']) . PHP_EOL;
				$message .= __('Regards,', 'kvc') . PHP_EOL . PHP_EOL;
				$message .= sprintf(__('Your %s Team', 'kvc'), $blogname) . PHP_EOL;
				$message .= trailingslashit(get_option('home')) . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;
				$message .= '</body>';

				if (wp_mail($to, $subject, $message, $headers)){
          echo"<script>";
					echo "alert('Your e-mail (" . $_POST['subscriber_email'] . ") has been added to our mailing list!')";
          echo"</script>";
				}	else	{
				   echo "<script>alert('Email pas envoyé: " . $_POST['subscriber_email'] . "')</script>";
				}
			}else{
        // Pop-up d'alerte si l'email semble invalide
        echo"<script>";
        echo"alert('Votre email" . $_POST['subscriber_email'] . " semble invalide et n'a pas été ajouté.
        Si le problème persiste, envoyez-nous un mail via la page Contact.)";
        echo"</script>";
			}
		}?>

		<div class="col-lg-4 col-md-4 col-sm-4 twitter-widget-area animate-onscroll">

			<form id="newsletter-footer" action="" method="POST">

				<h5><strong>Sign up</strong> for email updates</h5>
				<div class="newsletter-form">

					<div class="newsletter-email" style="margin-bottom:10px; " >
						<input type="email" name="subscriber_email" placeholder="Email address">
					</div>
					<div class="newsletter-submit">
							<input type="hidden" name="kv_submit_subscription" value="Submit">
							<input type="submit" name="submit_form" value="Submit">
					</div>
				</div>
			</form>
		</div>
	<?php }

} ?>
