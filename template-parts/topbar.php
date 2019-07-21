
<header id="topbar" class="py-3 bg-gray-light">
    <div class="container-xl px-4">
        <div class="d-flex flex-justify-between flex-items-center">

            <a class="f3" href="<?php echo get_bloginfo( 'url' ); ?>" title="<?php echo get_bloginfo( 'description' ); ?>">
                <?php echo get_bloginfo( 'name' ); ?>
            </a>

            <div class="d-flex flex-justify-between flex-items-center">

                <?php get_search_form(); ?>

                <button id="open-navigation" class="btn-link lh-0 ml-2 ml-md-4" aria-label="open navigation">
                    <svg height="32" width="32" viewBox="0 0 12 16" version="1.1" aria-hidden="true">
                        <path fill-rule="evenodd" d="M11.41 9H.59C0 9 0 8.59 0 8c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zm0-4H.59C0 5 0 4.59 0 4c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zM.59 11H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1H.59C0 13 0 12.59 0 12c0-.59 0-1 .59-1z">
                        </path>
                    </svg>
                </button>

            </div>

        </div>
    </div>
</header>