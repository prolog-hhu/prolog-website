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

        <h1 class="h00">Willkommen auf begleitenden eLearning Website des <a href="https://user.phil.hhu.de/~petersen/WiSe1718_Prolog/WiSe1718_Prolog.html">Grundkurs Prolog</a></h1>

        <hr class="pb-4 mb-4" />

        <section>

            <h2 class="h02 mb-4">Aufgaben: </h2>

            <div class="d-flex flex-wrap flex-justify-between flex-items-center">
                <?php
                    $loop = new WP_Query( array( 'post_type' => 'lesson', 'order' => 'ASC', 'orderby' => 'title') );

                    if ( $loop->have_posts() ) :
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <article class="p-4 mb-4 border border-gray-light">
                                <h3 class="mb-2"><?php echo get_the_title(); ?></h3>

                                <a class="btn" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">> Bearbeiten</a>
                            </article>
                        
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>

        </section>

        <hr class="pb-4 mb-4" />

        <section>

            <h2 class="h02 mb-4">Onlinefolien / Wiki: </h2>

            <div class="d-flex flex-wrap flex-justify-between flex-items-center">
                <?php
                    $loop = new WP_Query( array( 'post_type' => 'wiki', 'order' => 'ASC', 'orderby' => 'title') );

                    if ( $loop->have_posts() ) :
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <article class="p-4 mb-4 border border-gray-light">
                                <h3 class="mb-2"><?php echo get_the_title(); ?></h3>
                                <?php the_excerpt(); ?>

                                <a class="btn" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">> Weiterlesen</a>
                            </article>
                        
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>

        </section>

    </main>

<?php get_footer(); ?>
