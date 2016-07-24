<div class="row row--search">
  <div class="column">
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <label>
            <span class="screen-reader-text show-for-sr"><?php echo _x( 'Pesquisar por:', 'label' ) ?></span>
            <input type="search" class="search-field"
                placeholder="<?php echo esc_attr_x( 'Pesquisar…', 'placeholder' ) ?>"
                value="<?php echo get_search_query() ?>" name="s"
                title="<?php echo esc_attr_x( 'Pesquisar por:', 'label' ) ?>" />
        </label>
        <button type="submit" class="search-submit">
          <span class="fa fa-search"></span>
        </button>
    </form>
  </div>
</div>
