<footer id="colophon" class="py-3 bg-gray-dark">
    <div class="container-xl px-4">
        <div class="d-flex flex-justify-between flex-items-center">
            <?php 
                wp_nav_menu(
                    array(
                        'container_class' => 'text-white',
                        'menu_class' => 'f5 d-flex list-style-none',
                        'item_class' => 'd-flex mr-4',
                        'theme_location' => 'footer_navigation',
                    )
                );
            ?>
        </div>
    </div>
</footer>