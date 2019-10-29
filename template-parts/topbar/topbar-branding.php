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

     <svg class="mr-2 lh-0" width="48" height="48" viewBox="0 0 48 48" aria-hidden="true" version="1.1">
        <path d="M31.33,15.522c-1.049,7.594 -7.066,13.611 -14.66,14.66c1.049,-7.594 7.066,-13.611 14.66,-14.66Z"
            style="fill:#0366d6;fill-rule:nonzero;" />
        <path d="M34.367,40.607c-6.112,4.628 -14.622,4.628 -20.734,0c6.112,-4.628 14.622,-4.628 20.734,0Z"
            style="fill:#0366d6;fill-rule:nonzero;" />
        <circle cx="24" cy="22.852" r="5.564" style="fill:#0366d6;" />
        <circle cx="24" cy="22.852" r="15.495" style="fill:none;stroke:#0366d6;stroke-width:5.4px;" />
     </svg>

     <span class="text-blue text-bold hide-sm">
         <?php echo get_bloginfo( 'name' ); ?>
     </span>

 </a>