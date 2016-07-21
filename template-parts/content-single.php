<article>

  <div class="row">
  	<div class="column capa-post capa-post--destaque capa-post--aberto" <?php if (has_post_thumbnail()) echo 'style="background-image: url(' . get_the_post_thumbnail_url() . ');"'; ?>>
        <div class="row">
          <div class="column hide-for-small-only">
            <?php the_title('<h1><span>', '</span></h1>'); ?>

            <?php if (has_excerpt()) : ?>
      				<section class="capa-post__detalhes">
      					<h2><?php the_excerpt(); ?></h2>
      					<time><?php printf( _x( '%s atrás', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>, <span class="author">por <?php the_author(); ?></span>
      				</section>
            <?php endif; ?>
          </div>
        </div>
  	</div>
  </div>

  <div class="row show-for-small-only">
    <div class="column titulo-post-mobile">
      <?php the_title('<h1><span>', '</span></h1>'); ?>
      <?php if (!is_page()) : ?>
        <section class="titulo-post-mobile__detalhes">
          <h2><?php the_excerpt(); ?></h2>
          <time><?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>, <span class="author">por <?php the_author(); ?></span>
        </section>
      <?php endif; ?>
    </div>
  </div>

  <div class="row row--full-width">
    <div class="column conteudo-post">
      <?php the_content(); ?>
    </div>
  </div>
</article>
