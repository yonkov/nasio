<div class="sidebar-box search-form-wrap">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="form-group">
            <label for="<?php echo $unique_id; ?>">
                <button type="submit" class="icon fa fa-search"><span
                        class="screen-reader-text"></span></button>
            </label>
            <input type="search" id="s" class="form-control" placeholder="<?php echo _e( 'Search', 'nasio' ); ?>.."
                value="<?php echo get_search_query(); ?>" name="s" />
        </div>
    </form>
</div>