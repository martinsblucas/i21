<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

	<main role="main" class="container">
      <section class="row lista-noticias" style="margin-bottom: 20px;">
      	<div class="col-12 col-md-10 single noticia">
        <h1 class="titulo">Resultados da busca por "<?php the_search_query(); ?>"</h1>
          <form class="search-form sb-search-open" id="searchform-a" role="search" method="get" action="<?php bloginfo("url"); ?>">
                    <div class="form-group pull-right sb-search-open" id="search">
                      <input type="text" class="form-control" placeholder="Pesquisar" name="s" id="s" value="<?php the_search_query(); ?>">
                      <button type="submit" id="searchsubmit" class="form-control form-control-submit">Submit</button>
                      <span class="search-label"><i class="fas fa-search"></i></span>
                    </div>
                  </form>
          </div>
        </div>
      </section>
        <?php
		$big = 999999999; // need an unlikely integer
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        query_posts( $query_string . '&post_type=post&orderby=date&order=DESC&posts_per_page=5&paged='.$paged.'' );
		if ( have_posts() ) { ?>
        <div class="pagination">
         <?php echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
			) );
			?>
        </div>
		<?php while ( have_posts() ) { the_post();
			$thumb_ultimas = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ultimas');
			$src_ultimas = $thumb_ultimas['0'];
		?>
          <section class="row lista-noticias">
          <article class="col-12 col-md-10 single noticia">
          	<hr />
        	<h7><?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
        	<a href="<?php the_permalink(); ?>">
            <figure class="thumb col-6 col-md-4">

            	<img src="<?php echo $src_ultimas; ?>" />
            </figure>
            <h1 class="col-6 col-md-8"><?php the_title(); ?>
            		<time><?php $data = get_the_date('d/m/Y'); echo $data; ?></time>
                   <span class="resumo">
					<?php
					$post = $wp_query->post;
					$descrip = strip_tags($post->post_content);
					$descrip_more = '';
					if (strlen($descrip) > 155) {
						$descrip = substr($descrip,0,200);
						$descrip_more = '...';
					}
					$descrip = str_replace('"', '', $descrip);
					$descrip = str_replace("'", '', $descrip);
					$descripwords = preg_split('/[\n\r\t ]+/', $descrip, -1, PREG_SPLIT_NO_EMPTY);
					array_pop($descripwords);
					$descrip = implode(' ', $descripwords) . $descrip_more;
					echo $descrip;
					?>
                    </span>
            </h1>
            </a>
          </article>
          </section>
       		<?php } ?>
			<?php } else { ?>
          <section class="row lista-noticias">
          <article class="col-12 col-md-10 single noticia">
          <p class="resumo" style="margin-left: 22px;">Nada encontrado.</p>
          </article>
          </section>
            <?php } wp_reset_postdata(); ?>
        <div class="pagination">
        <?php echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
			) ); ?>
        </div>
    </main>
<?php get_footer(); ?>