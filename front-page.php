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

    <main class="container-lg px-3 py-6">

        <section>

                 <div class="d-flex flex-wrap flex-justify-center flex-items-center text-center">
        
                    <article class="col-12 col-md-9 mt-6">
                        <h1 class="h0-mktg mb-3">
                            Willkommen auf dem begleitenden eLearning Portal des <a target="_blank" title="Wiebke Petersens Kurswebseite besuchen" href="https://user.phil.hhu.de/~petersen/WiSe1718_Prolog/WiSe1718_Prolog.html">Grundkurs Prolog</a>
                        </h1>

                        <span class="d-block mb-3 f3">Bearbeite die Lektionen mit ihren Quizzen, schaue dir die Foliensätze an oder nutze den Compiler zur Überprüfung deiner Lösung.</span>
                        
                        <a class="btn btn-primary btn-large mr-2" href="<?php echo get_bloginfo('url'); ?>/course/prolog-einfhuerung/">Zu den Lektionen</a>

                         <a class="btn btn-outline btn-large" target="_blank" href="https://swish.phil.hhu.de/">Zur SWISH Umgebung</a>
                    </article>
               
        </section>

        <hr class="pb-3 my-6" />

        <section>

            <h2 class="h0-mktg mb-4 text-center">
                <?php _e('Onlinefolien / Wiki:', 'prlg'); ?>
            </h2>

            <div class="gutter d-flex flex-wrap flex-justify-between">
                <?php
                    $loop = new WP_Query(array( 'post_type' => 'wiki', 'order' => 'ASC', 'orderby' => 'name', 'posts_per_page'=>-1));

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post(); ?>

                            <div class="col-12 col-md-6 mb-5">
                                <article class="collapse py-3 px-4 border border-gray-light">
                                    <div class="header">
                                        <h3 class="h2"><?php echo get_the_title(); ?></h3>
                                    </div>
                                    <div class="content mt-3">
                                        <?php the_excerpt(); ?>
                                        <a class="btn btn-primary btn-sm mt-2" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Weiterlesen</a>

                                        <a class="btn btn-outline btn-sm mt-2" href="<?php the_field('pdf_folien'); ?>" target="_blank">Folien ansehen</a>

                                        <?php if (get_field('musterlosung') != '' && get_field('musterlosung_anzeigen') == true): ?>
                                            <a class="btn btn-invisible btn-sm mt-2" href="<?php the_field('musterlosung'); ?>" target="_blank">Musterlösung herunterladen</a>
                                        <?php endif; ?>
                                    </div>
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
