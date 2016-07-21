<a href="<?php echo esc_url( get_permalink() ); ?>" class="column capa-post <?php if (is_sticky() && is_home() && !is_paged()) : ?> capa-post--destaque <?php else : ?> small-12 medium-expand <?php endif; ?>" <?php if (has_post_thumbnail()) echo 'style="background-image: url(' . get_the_post_thumbnail_url() . ');"'; ?>>
	<div>
      <?php the_title('<h1><span>', '</span></h1>'); ?>

      <?php if (has_excerpt()) : ?>
				<section class="capa-post__detalhes hide-for-small-only">
					<h2><?php the_excerpt(); ?></h2>
					<time><?php printf( _x( '%s atrás', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>, <span class="author">por <?php the_author(); ?></span>
				</section>
      <?php endif; ?>
	</div>
</a>
