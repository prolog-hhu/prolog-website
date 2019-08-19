 <?php
/**
 * Template part for displaying topbar branding
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

 <a class="d-flex flex-justify-between flex-items-center" href="<?php echo get_bloginfo( 'url' ); ?>"
     title="<?php echo get_bloginfo( 'description' ); ?>">

     <svg class="mr-2 lh-0" width="48" height="48" viewBox="0 0 832 700" aria-hidden="true" version="1.1">
         <path
             d="M573.096,203.038c-15.535,112.445 -104.625,201.535 -217.069,217.07c15.535,-112.444 104.625,-201.534 217.069,-217.07Z"
             style="fill:#404040;" />
         <path d="M618.052,574.453c-90.495,68.525 -216.487,68.525 -306.982,0c90.495,-68.525 216.487,-68.525 306.982,0Z"
             style="fill:#404040;" />
         <circle cx="464.561" cy="311.573" r="82.379" style="fill:#404040;" />
         <circle cx="464.561" cy="311.573" r="229.429" style="fill:none;stroke:#424242;stroke-width:80px;" />
     </svg>

     <span class="text-bold muted-link hide-sm">
         <?php echo get_bloginfo( 'name' ); ?>
     </span>

 </a>