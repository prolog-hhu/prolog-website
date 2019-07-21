 
 <header id="navigation" class="col-9 col-md-5 col-lg-4 col-xl-3 position-absolute top-0 right-0 height-stretch bg-gray">
    
    <div class="d-flex flex-justify-end bg-gray-dark border-bottom border-white-fade-50">
    
        <button id="close-navigation" class="btn-link py-3 px-4 lh-0" type="button" aria-label="close navigation">
                <svg height="32" width="32" viewBox="0 0 12 16" version="1.1" aria-hidden="true">
                    <path fill="#fff" fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
                </svg>
        </button>
    </div>
 
    <?php 
        wp_nav_menu(
            array(
                'container_class' => 'text-white',
                'menu_class' => 'f3 list-style-none',
                'submenu_class' => 'f4 mt-2 d-flex flex-items-center flex-wrap width-fit',
                'item_class' => 'd-block py-3 px-4 border-bottom border-white-fade-50',
                'submenu_item_class' => 'btn btn-outline-white m-2 d-flex',
                'theme_location' => 'primary_navigation',
            )
        );
    ?>

</header>