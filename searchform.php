<form action="/" method="get">
    <div class="d-flex">
        <input type="search" name="search" class="search-field form-control mr-2"
                placeholder="<?php echo esc_attr_x( 'Suche..', 'placeholder' ) ?>"
                value="<?php echo get_search_query() ?>"
                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

        <button type="submit" class="search-submit btn-link lh-0">
            <svg class="p-1" height="32" width="32" viewBox="0 0 16 16" version="1.1" aria-hidden="true">
                <path fill-rule="evenodd" d="M15.7 13.3l-3.81-3.83A5.93 5.93 0 0 0 13 6c0-3.31-2.69-6-6-6S1 2.69 1 6s2.69 6 6 6c1.3 0 2.48-.41 3.47-1.11l3.83 3.81c.19.2.45.3.7.3.25 0 .52-.09.7-.3a.996.996 0 0 0 0-1.41v.01zM7 10.7c-2.59 0-4.7-2.11-4.7-4.7 0-2.59 2.11-4.7 4.7-4.7 2.59 0 4.7 2.11 4.7 4.7 0 2.59-2.11 4.7-4.7 4.7z"></path>
            </svg>
        </button>
    </div>
</form>