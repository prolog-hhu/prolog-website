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

        <section>

                 <div class="d-flex flex-wrap flex-justify-between flex-items-center">
        
                    <article class="col-12 col-md-7">
                        <h1 class="mb-3">
                            Willkommen auf dem begleitenden eLearning Portal des <a target="_blank" href="https://user.phil.hhu.de/~petersen/WiSe1718_Prolog/WiSe1718_Prolog.html">Grundkurs Prolog</a>
                        </h1>

                        <span class="d-block mb-3 f3">Registriere dich um die Aufgaben freizuschalten oder schaue dir die Foliensätze direkt hier an.</span>
                        <a class="btn btn-primary mr-1" href="<?php echo get_bloginfo( 'url' ); ?>/index.php/registrieren/">Zur Registrierung</a>
                        <a class="btn btn-blue" href="<?php echo get_bloginfo( 'url' ); ?>/index.php/course/prolog-einfhuerung/">Zu den Aufgaben</a>
                    </article>
               

                    <article class="hide-sm hide-md col-12 col-md-5 glitchy">
                         <svg width="400" height="400" viewBox="0 0 832 700" aria-hidden="true" version="1.1">
                            <path d="M573.096,203.038c-15.535,112.445 -104.625,201.535 -217.069,217.07c15.535,-112.444 104.625,-201.534 217.069,-217.07Z" style="fill:#404040;"></path>
                            <path d="M618.052,574.453c-90.495,68.525 -216.487,68.525 -306.982,0c90.495,-68.525 216.487,-68.525 306.982,0Z" style="fill:#404040;"></path>
                            <circle cx="464.561" cy="311.573" r="82.379" style="fill:#404040;"></circle>
                            <circle cx="464.561" cy="311.573" r="229.429" style="fill:none;stroke:#424242;stroke-width:80px;"></circle>
                        </svg>
                        <svg width="400" height="400" viewBox="0 0 832 700" aria-hidden="true" version="1.1">
                            <path d="M573.096,203.038c-15.535,112.445 -104.625,201.535 -217.069,217.07c15.535,-112.444 104.625,-201.534 217.069,-217.07Z"></path>
                            <path d="M618.052,574.453c-90.495,68.525 -216.487,68.525 -306.982,0c90.495,-68.525 216.487,-68.525 306.982,0Z"></path>
                            <circle cx="464.561" cy="311.573" r="82.379"></circle>
                            <circle cx="464.561" cy="311.573" r="229.429" style="fill:none;stroke-width:80px;"></circle>
                        </svg>
                        <svg width="400" height="400" viewBox="0 0 832 700" aria-hidden="true" version="1.1">
                            <path d="M573.096,203.038c-15.535,112.445 -104.625,201.535 -217.069,217.07c15.535,-112.444 104.625,-201.534 217.069,-217.07Z" ></path>
                            <path d="M618.052,574.453c-90.495,68.525 -216.487,68.525 -306.982,0c90.495,-68.525 216.487,-68.525 306.982,0Z"></path>
                            <circle cx="464.561" cy="311.573" r="82.379"></circle>
                            <circle cx="464.561" cy="311.573" r="229.429" style="fill:none;stroke:#424242;stroke-width:80px;"></circle>
                        </svg>
                    </article>

        </section>

   

        <hr class="pb-4 mb-4" />

        <section>

            <h2 class="h1 mb-4">
                <?php _e( 'Onlinefolien / Wiki:', 'prlg' ); ?>
            </h2>

            <div class="gutter d-flex flex-wrap flex-justify-between flex-items-center">
                <?php
                    $loop = new WP_Query( array( 'post_type' => 'wiki', 'order' => 'ASC', 'orderby' => 'name') );

                    if ( $loop->have_posts() ) :
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <div class="col-12 col-md-6 mb-5">
                                <article class="p-4 border border-gray-light">
                                    <h3 class="h2 mb-2"><?php echo get_the_title(); ?></h3>
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
