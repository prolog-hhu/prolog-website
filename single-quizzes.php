<?php
/**
 * The template for displaying page/post (default)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package WordPress
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

	<main class="container-xl px-3 py-6">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
			?>
				
				<article id="post-<?php the_ID(); ?>">

					<h1 class="mb-4"><?php the_title(); ?></h1>

					<div class="gutter d-flex flex-wrap flex-justify-center flex-items-center mb-4">

						<div class="col-12 col-md-6">
							<?php the_content(); ?>
						</div>

						<div class="col-12 col-md-6">
							<?php

								// Check rows exists and loop through
								if( have_rows('quiz') ) {
									while( have_rows('quiz') ) { 
										
										# get row content, save data
										the_row();
										$question = get_sub_field('question');

										# show question
										echo $question['description'];

										?>

										<form class="quiz mb-4" action="#">
										
										<?php 
											if( have_rows('answer') ) {
												while( have_rows('answer') ) { 

													# get row content, save data
													the_row();

													$correct = get_sub_field('correct');
													$content = get_sub_field('content');
													$return = get_sub_field('return');

													?>

													<div class="form-checkbox">
														<label>
															<input type="checkbox" <?php echo $correct ? "correct" : "" ?>>
															<em class="highlight"><?php echo $content ?></em>
														</label>
													</div>

													<?php

												}
											}
										?>

										<button type="submit" class="btn btn-primary">Überprüfen</button>

										</form>

									<?php
									}
								}
							?>
						</div>
					</div>

					<div class="gutter d-flex flex-wrap flex-justify-center flex-items-center">
						<a href="#" class="btn btn-blue mr-2">
							> Zur nächsten Aufgabe 
						</a>
						<a href="#" class="btn btn-grey">
							>> Zum nächsten Kapitel 
						</a>
					</div>

				</article>
			<?php
			}

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

	</main>
<?php get_footer(); ?>