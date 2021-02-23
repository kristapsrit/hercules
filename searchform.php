<form id="searchform" class="p-20" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" class="search-field px-10" name="s" placeholder="Search..." value="<?php echo get_search_query(); ?>">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>