<?php
/**
 * The template for displaying non blog front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package WordPress
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

    <main class="container px-3 py-6">

        <h1>
            Willkommen auf dem begleitenden eLearning Portal des <a target="_blank" href="https://user.phil.hhu.de/~petersen/WiSe1718_Prolog/WiSe1718_Prolog.html">Grundkurs Prolog</a>
        </h1>

        <hr class="pb-4 mb-4" />

        <section>

            <h2 class="mb-4">
                <?php _e( 'Onlinefolien / Wiki:', 'prlg' ); ?>
            </h2>

            <div class="gutter d-flex flex-wrap flex-justify-between flex-items-center">
                <?php
                    $loop = new WP_Query( array( 'post_type' => 'wiki', 'order' => 'ASC', 'orderby' => 'name') );

                    if ( $loop->have_posts() ) :
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <div class="col-12 col-md-6 mb-5">
                                <article class="p-4 border border-gray-light">
                                    <h3 class="mb-2"><?php echo get_the_title(); ?></h3>
                                    <?php the_excerpt(); ?>

                                    <a class="btn" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">> Weiterlesen</a>
                                </article>
                            </div>
                        
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>

        </section>

    </main>

<?php get_footer(); ?>
