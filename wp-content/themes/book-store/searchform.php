<form class="form-inline mr-5 pr-4" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
  
    <input type="text" name="s" id="search" class="form-control mr-sm-2" value="<?php the_search_query(); ?>" />
    <input type="submit" class="btn btn-outline-info my-2 my-sm-0" alt="Search" />
</form>