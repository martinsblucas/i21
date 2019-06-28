<?php get_header(); ?>

	<main role="main" class="container">

      <section class="row single">
		<?php
        global $query_string;
		$loop = new WP_Query ($query_string);
		// The Loop
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) {
			$loop->the_post();
			
		$tipo_post = get_post_meta($post->ID, 'wpcf-imagem-destaque', true);
		if ($tipo_post === 'grande') { $tipo = "grande"; $tamanho_img = "large"; }
		elseif($tipo_post === 'media') { $tipo = "media"; $tamanho_img = "medium"; }
		elseif($tipo_post === 'pequeno') { $tipo = "pequena"; $tamanho_img = "thumbnail"; }
		else { $tipo = "grande"; $tamanho_img = "large"; }
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $tamanho_img);
		$src = $thumb['0'];
		$post_id = get_the_id();
        ?>
        <article class="col-12 col-md-10 materia">
        	<hr />
            <h7><?php $cat_Id = get_the_category($post->ID);
			$categories = get_category_parents( $cat_Id[0], TRUE, '' );
			$title = get_the_title();
			printf( $categories ); ?></h7>
			<h1><?php the_title(); ?></h1>
            <div class="share">
            <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(the_title('','', false)) ?>', 'Facebook', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=700, HEIGHT=400');"target="_blank" title="Compartilhar artigo no Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" onclick="window.open('https://twitter.com/home?status=<?php the_permalink() ?>', 'Twitter', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=700, HEIGHT=400');"target="_blank" title="Compartilhar artigo no Twitter"><i class="fab fa-twitter-square"></i></a>
            <a href="https://wa.me/?text=<?php the_permalink(); ?>" target="_blank" title="Compartilhar artigo no WhatsApp"><i class="fab fa-whatsapp-square"></i></a>
            </div>
            <time><?php $data = get_the_date('d/m/Y'); echo $data; ?></time>
            <figure class="thumb<?php if(!empty($tipo_post)) { ?><?php echo " ".$tipo; ?><?php } else { ?> desalinhado<?php } ?>">
                    <img src="<?php echo $src; ?>" />
                    <?php
                    if(!empty(get_post(get_post_thumbnail_id())->post_excerpt)) {
                    ?>
                    <figcaption>
                        <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
                    </figcaption>
                    <?php 
                    
                    }	else {
                    ?>
                    
                    <?php } ?>
            </figure>
            <div class="texto">
            <?php if(qtranxf_getLanguage() != "pb") { ?>
			<?php
            $pb_url = str_replace('/es/', '/pb/', qtranxf_convertURL('', 'es'));
            ?>
            <div style="margin-bottom: 20px; font-size: 10pt; float: right; clear: both;">
            <div style="display: table;">
            <img src="<?php bloginfo("url"); ?>/wp-content/plugins/qtranslate-x/flags/br.png" style="display: table-cell; padding-right: 10px;" /> <span style="display: table-cell;"><a href="<?php echo $pb_url; ?>">Clique aqui para retornar ao artigo em português.</a></span>
            </div>
            </div>
            
            <?php } else { ?>
            <div style="margin-bottom: 20px; font-size: 10pt;">
            <?php
            if (qtranxf_isAvailableIn($post_id, $lang='es')) {
            $es_url = qtranxf_convertURL('', 'es')
            ?>
            <div style="display: table;">
            <img src="<?php bloginfo("url"); ?>/wp-content/plugins/qtranslate-x/flags/es.png" style="display: table-cell; padding-right: 10px;" /> <span style="display: table-cell;"><a href="<?php echo $es_url; ?>">Esta entrada está disponible en español.</a></span>
            </div>
            <?php } else { } ?>
            
            <?php
            if (qtranxf_isAvailableIn($post_id, $lang='fr')) {
            $fr_url = qtranxf_convertURL('', 'fr')
            ?>
            <div style="display: table;">
            <img src="<?php bloginfo("url"); ?>/wp-content/plugins/qtranslate-x/flags/fr.png" style="display: table-cell; padding-right: 10px;" /> <span style="display: table-cell;"><a href="<?php echo $fr_url; ?>">Cet article est disponible en français.</a></span>
            </div>
            <?php } else { } ?>
            
            <?php
            if (qtranxf_isAvailableIn($post_id, $lang='en')) {
            $en_url = qtranxf_convertURL('', 'en')
            ?>
            <div style="display: table;">
            <img src="<?php bloginfo("url"); ?>/wp-content/plugins/qtranslate-x/flags/gb.png" style="display: table-cell; padding-right: 10px;" /> <span style="display: table-cell;"><a href="<?php echo $en_url; ?>">This entry is available in English.</a></span>
            </div>
            <?php } else { } ?>
            
            <?php
            if (qtranxf_isAvailableIn($post_id, $lang='it')) {
            $it_url = qtranxf_convertURL('', 'it')
            ?>
            <div style="display: table;">
            <img src="<?php bloginfo("url"); ?>/wp-content/plugins/qtranslate-x/flags/it.png" style="display: table-cell; padding-right: 10px;" /> <span style="display: table-cell;"><a href="<?php echo $it_url; ?>">Questo articolo è disponibile in italiano.</a></span>
            </div>
            <?php } else { } ?>
            </div>
            <?php } ?>
            <?php the_content(); ?>
            <?php if (in_category("todo-mundo")) { ?>
            <p>&nbsp;
            <br /><em>Os artigos e ensaios publicados na editoria TODO MUNDO (Opiniões e Debates) não refletem necessariamente a opinião do PCdoB sobre o tema abordado.</em></p>
            <?php } else { } ?>
            <?php if (in_category("notas-internacionais")) { ?>
            <div class="row autor">
            <div class="col-12 col-md-10 col-lg-8">
        <article class="notas-internacionais">
        	<hr />
            <h7><a>A autora</a></h7>
            <div class="row">
            <div class="col-6 col-md-8 col-lg-7">
            	<h2>Ana Maria Prestes</h2>
            	<span class="resumo"><p>A Cientista Social Ana Maria Prestes começou a sua militância no movimento estudantil secundarista, foi diretora da União da Juventude Socialista, integrou o Comitê Central do PCdoB e, atualmente, trabalha na Câmara dos Deputados.</p></span>
            </div>
            <div class="col-6 col-md-4 col-lg-5">
            	<figure>
            		<img src="http://localhost/i21/wp-content/uploads/2018/10/aninha1111124839-400x320.jpg" />
            	</figure>
            </div>
            </div>
            </article>
            </div>
            </div>
            <?php } else { } ?>
            <div class="share" style="padding: 0">
            <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(the_title('','', false)) ?>', 'Facebook', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=700, HEIGHT=400');"target="_blank" title="Compartilhar artigo no Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" onclick="window.open('https://twitter.com/home?status=<?php the_permalink() ?>', 'Twitter', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=700, HEIGHT=400');"target="_blank" title="Compartilhar artigo no Twitter"><i class="fab fa-twitter-square"></i></a>
            <a href="https://wa.me/?text=<?php the_permalink(); ?>" target="_blank" title="Compartilhar artigo no WhatsApp"><i class="fab fa-whatsapp-square"></i></a>
            </div>
            <?php if(has_tag()) { ?>
            <div class="tags_single">
					<?php
                    $posttags = get_the_tags();
                    if ($posttags) {
                      foreach($posttags as $tag) {
                        echo '<a class="tag" href="' . get_tag_link($tag->term_id) . '" />' . $tag->name . '</a>'; 
                      }
                    }
                    ?>
                    </div>
            <?php } ?>
            </div>
        </article>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
      </section>
      <section class="row lista-noticias">
      	<div class="col-12 col-md-10 single noticia">
        <h1 class="titulo">Leia também:</h1>
        </div>
      </section>
      	<?php
		$tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', array ('fields' => 'ids') );
		$args = array (
    		'post__not_in'        => array( get_queried_object_id() ),
    		'posts_per_page'      => 6,
    		'ignore_sticky_posts' => 1,
			'order' => 'desc',
    		'orderby' => 'date',
    		'tax_query' => array (
        	array ('taxonomy' => 'post_tag', 'terms'    => $tags ) )
			);
			$my_query = new wp_query( $args );
			if( $my_query->have_posts() ) {
			while( $my_query->have_posts() ) {
			$my_query->the_post();
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
       		<?php } }
			wp_reset_postdata();
			?>
    </main>
<?php get_footer(); ?>