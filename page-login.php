<?php
/**
 * Template Name: Login Page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package WordPress
 * @since 1.0.0
 */


// page state: 0 = open, 1 = sended, -1 = errors
$state = 0;

// if page is opened with POST data
if ( isset($_POST['submit'] ) ) {

		// save POST data
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];


		// create error object
		$errors = new WP_Error;

		// CHECK: emtpy fields
        if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
			$errors->add('field', 'Bitte fülle alle Pflichtfelder (*) aus');
		}

		// CHECK: username lenghts
		if ( 4 > strlen( $username ) ) {
			$errors->add( 'username_length', 'Dein Nutzername sollte mindestens 4 Zeichen haben.' );
		}

		// CHECK: username exists
		if ( username_exists( $username ) ) {
			$errors->add('user_name', 'Dein Nutzername wird bereits verwendet!');
		}

		// CHECK: username valid
		if ( !validate_username( $username ) ) {
			$errors->add( 'username_invalid', 'Dein Nutzername ist ungültig.' );
		}

		// CHECK: password lenghts
		if ( 5 > strlen( $password ) ) {
			$errors->add( 'password', 'Dein Passwort sollte mindestens 5 Zeichen haben.' );
		}

		// CHECK: email exists
		if ( email_exists( $email ) ) {
			$errors->add( 'email', 'Deine E-Mail wird bereits verwendet!' );
		}

		// CHECK: email valid
		if ( !is_email( $email ) ) {
			$errors->add( 'email_invalid', 'Deine E-Mail ist ungültig.' );
		}


		// if no errors, register user
		if ( 1 > count( $errors->get_error_messages() ) ) {

			$userdata = array(
				'user_login'  =>  sanitize_user( $username ),
				'user_email'  =>  sanitize_email( $email ),
				'user_pass'   =>  esc_attr( $password )
			);

			$user = wp_insert_user( $userdata );

			$state = 1;
		}
	}
?>

<?php get_header(); ?>

	<main class="container-sm px-3 py-6">

		<?php // get post content
			if ( have_posts() ) {
				// Load posts loop.
				while ( have_posts() ) {
					the_post();
					
					get_template_part( 'template-parts/content/content' );
				}
			}
		?>

		<?php if($state != 1) : ?>

			<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">

				<div class="mb-3">
					<label class="f5" for="username">Benutzername*:</label>
					<input class="form-control" type="text" name="username" value="<?php echo ( isset( $_POST['username'] ) ? $username : null ) ?>">
				</div>

				<div class="mb-3">
					<label class="f5" for="email">E-Mail*:</label>
					<input class="form-control" type="text" name="email" value="<?php echo ( isset( $_POST['email']) ? $email : null ) ?>">
				</div>
				
				<div class="mb-3">
					<label class="f5" for="password">Passwort*:</label>
					<input class="form-control" type="password" name="password" value="<?php echo ( isset( $_POST['password'] ) ? $password : null ) ?>">
				</div>

				<input class="btn btn-primary" type="submit" name="submit" value="Registrieren"/>
			</form>

			<?php if ( is_wp_error( $errors ) ) : ?>

				<div class="errors bg-red-light p-4">
			
				<?php foreach ( $errors->get_error_messages() as $error ) : ?>
				
					<?php echo $error ?> <br/>
					
				<?php endforeach; ?>

				</div>
		
			<?php endif; ?>
		<?php endif; ?>


	</main>
<?php get_footer(); ?>