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
    if (have_posts()) {

        // Load posts loop.
        while (have_posts()) {
            the_post(); ?>

			<article id="post-<?php the_ID(); ?>">

				<h1 class="mb-4"><?php the_title(); ?></h1>

				<div class="gutter d-flex flex-wrap flex-justify-center mb-4">

					<div class="col-12 col-md-8 mb-4 mb-md-0">
						<?php the_content(); ?>
					</div>

					<div class="col-12 col-md-4">
                        <div class="Box mb-4">
                
                            <div class="Box-header">
                                <h2 class="Box-title f3"><?php _e('Quizübersicht:', 'prolog'); ?></h2>
                            </div>

                            <?php // Check quiz links exists and loop through
                            if (have_rows('quizzes')) { ?>

                                <ul>

                                    <?php
                                    while (have_rows('quizzes')) {
                                        the_row();
                                        $link = get_sub_field('link'); ?>

                                        <li class="Box-row">
                                            <a  href="<?php echo esc_url($link['url']); ?>" 
                                                target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>">
                                                    <?php echo esc_html($link['title']); ?>
                                            </a>
                                        </li>
                                <?php
                                    } ?>

                                </ul>
                                <?php
                                } ?>
                            </div>
                            
                            <div class="d-flex flex-justify-center flex-items-center">
                                <div class="BtnGroup">
                                    <a href="<?php echo esc_url(get_field('last_task')); ?>" class="btn BtnGroup-item">
                                        <?php _e('< Vorherige Aufgabe', 'prolog'); ?>
                                    </a>
                                    <a href="<?php echo esc_url(get_field('next_task')); ?>" class="btn BtnGroup-item">
                                        <?php _e('> Nächster Aufgabe', 'prolog'); ?>
                                    </a>
                                </div>
                            </div>

                        </div>
				</div>

			</article>
	<?php
        }
    } else {

        // If no content, include the "No posts found" template.
        get_template_part('template-parts/content/content', 'none');
    }
    ?>

</main>
<?php get_footer(); ?>