<div class="sidebar-box search-form-wrap">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="form-group">
            <label for="s">
                <button type="submit" class="icon fa fa-search"><span
                        class="screen-reader-text"></span></button>
            </label>
            <input type="search" id="s" class="form-control" placeholder="<?php _e( 'Search', 'nasio' ); ?>.."
                value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
        </div>
    </form>
</div>