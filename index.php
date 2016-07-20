<?php get_header(); ?>

  <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

      <?php $stickyCount = 0; ?>

			<?php if ( is_home() && is_front_page() && !is_paged() ) :
				$stickyCount = count(get_option( 'sticky_posts' ));
			endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

        $newRow = (is_sticky() && is_home() && !is_paged()) || (($wp_query->current_post - $stickyCount) % 2 == 0);
        $endRow = (is_sticky() && is_home() && !is_paged()) || (($wp_query->current_post - $stickyCount) % 2 == 1) || ($wp_query->current_post == $wp_query->post_count - 1);

        //echo $stickyCount;
        //echo 'CURRENT_POST: ' . $wp_query->current_post . ' | NEW: ' . $newRow . ' | END: ' . $endRow;
      ?>
        <?php if ($newRow) : ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
        <?php endif; ?>
          <?php
    				/*
    				 * Include the Post-Format-specific template for the content.
    				 * If you want to override this in a child theme, then include a file
    				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    				 */
    				get_template_part( 'template-parts/content', get_post_format() );
          ?>
        <?php if ($endRow) : ?>
          </article>
        <?php endif; ?>
      <?php
			// End the loop.
			endwhile;

      ?>
      <nav>
        <div class="row">
          <?php if (get_previous_posts_link( 'Mais recentes' ) != '') : ?>
            <div class="column pages-navigation">
              <?php
                previous_posts_link( 'Mais recentes' );
              ?>
            </div>
          <?php endif; ?>
          <?php if (get_next_posts_link( 'Mais antigos' ) != '') : ?>
    		    <div class="column pages-navigation">
              <?php
                next_posts_link( 'Mais antigos' );
              ?>
            </div>
          <?php endif; ?>
        </div>
      </nav>
      <?php

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
