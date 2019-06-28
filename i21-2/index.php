<?php get_header(); ?>

<div class="container-fluid site">

    <main role="main" class="container">

        <section class="row capa">
   <?php
	$query_manchete = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'capa',
				'field'    => 'slug',
				'terms'    => 'manchete',
			),
		), 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => '1');
	$loop_manchete = new WP_Query( $query_manchete );
	?>
	
	<?php // The Loop
	if ( $loop_manchete->have_posts() ) {
		while ( $loop_manchete->have_posts() ) {
		$loop_manchete->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'manchete');
			$src = $thumb['0'];
	?>
    <?php $post_manchete = $post->ID; ?>
        <div class="col-md-7 area-manchete">
            <div class="row">
                <article class="col-md-12 manchete">
                	<h7>
					<?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
                	<a href="<?php the_permalink(); ?>">
                    <h1><span><?php the_title(); ?></span></h1>
                    <figure class="thumb">
                    	<img src="<?php echo $src; ?>" />
                    </figure>
                    <span class="resumo">
					<?php
					$post_manchete2 = $loop_manchete->post;
					$descrip_manchete = strip_tags($post_manchete2->post_content);
					$descrip_manchete_more = '';
					if (strlen($descrip_manchete) > 155) {
						$descrip_manchete = substr($descrip_manchete,0,500);
						$descrip_manchete_more = '...';
					}
					$descrip_manchete = str_replace('"', '', $descrip_manchete);
					$descrip_manchete = str_replace("'", '', $descrip_manchete);
					$descrip_manchetewords = preg_split('/[\n\r\t ]+/', $descrip_manchete, -1, PREG_SPLIT_NO_EMPTY);
					array_pop($descrip_manchetewords);
					$descrip_manchete = implode(' ', $descrip_manchetewords) . $descrip_manchete_more;
					echo $descrip_manchete;
					?>
                    </span>
                    </a>
                </article>
            </div>
        </div>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
        
        <div class="col-md-5 col-xl-5 lateral">
        <div class="row">
        <?php
        $query_notas = array(
            'post_type' => 'post', 'category_name'=> 'notas-internacionais', 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => '2');
        $loop_notas = new WP_Query( $query_notas );
        $category_notas = get_category_link( 2 );
		?>
        
        <article class="col-12 notas-internacionais">
        <hr class="d-sm-block d-md-none" />
        <h7><a href="<?php echo $category_notas; ?>">Notas internacionais</a></h7>
        <?php // The Loop
        if ( $loop_notas->have_posts() ) {
            while ( $loop_notas->have_posts() ) {
            $loop_notas->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ultimas');
			$src = $thumb['0'];
        ?>
        <?php $post_notas = $post->ID; ?>
            <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $src; ?>" class="img-destaque" />
            <h1><?php the_title(); ?></h1>
                    <span class="resumo">
					<?php
					$post_notas2 = $loop_notas->post;
					$descrip_notas = strip_tags($post_notas2->post_content);
					$descrip_notas_more = '';
					if (strlen($descrip_notas) > 155) {
						$descrip_notas = substr($descrip_notas,0,200);
						$descrip_notas_more = '...';
					}
					$descrip_notas = str_replace('"', '', $descrip_notas);
					$descrip_notas = str_replace("'", '', $descrip_notas);
					$descrip_notaswords = preg_split('/[\n\r\t ]+/', $descrip_notas, -1, PREG_SPLIT_NO_EMPTY);
					array_pop($descrip_notaswords);
					$descrip_notas = implode(' ', $descrip_notaswords) . $descrip_notas_more;
					echo $descrip_notas;
					?>
                    </span>
            </a>
        <hr class="divisoria" />
		<?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
        <div class="row footer-notas" style="clear: both;">
        <div class="col-6 ass">
        Por Ana Prestes
        </div>
        <div class="col-6 mais">
        <a href="<?php echo $category_notas; ?>">Ver todas</a>
        </div>
        </div>
        </article>
<!--
   <?php
	$query_destaque2 = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'capa',
				'field'    => 'slug',
				'terms'    => 'destaque-2',
			),
		), 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => '1');
	$loop_destaque2 = new WP_Query( $query_destaque2 );
	?>
	<?php // The Loop
	if ( $loop_destaque2->have_posts() ) {
		while ( $loop_destaque2->have_posts() ) {
		$loop_destaque2->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide');
			$src = $thumb['0'];
	?>
    <?php $post_destaque2 = $post->ID; ?>
        <article class="col-12 foto-cima">
        	<h7>
					<?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
            <a href="<?php the_permalink(); ?>">
            <figure class="thumb">
            	<img src="<?php echo $src; ?>" />
            </figure>
            <h1><?php the_title(); ?></h1>
                   <span class="resumo">
					<?php
					$post_destaque22 = $loop_destaque2->post;
					$descrip_destaque2 = strip_tags($post_destaque22->post_content);
					$descrip_destaque2_more = '';
					if (strlen($descrip_destaque2) > 155) {
						$descrip_destaque2 = substr($descrip_destaque2,0,125);
						$descrip_destaque2_more = '...';
					}
					$descrip_destaque2 = str_replace('"', '', $descrip_destaque2);
					$descrip_destaque2 = str_replace("'", '', $descrip_destaque2);
					$descrip_destaque2words = preg_split('/[\n\r\t ]+/', $descrip_destaque2, -1, PREG_SPLIT_NO_EMPTY);
					array_pop($descrip_destaque2words);
					$descrip_destaque2 = implode(' ', $descrip_destaque2words) . $descrip_destaque2_more;
					echo $descrip_destaque2;
					?>
                    </span>
            </a>
        </article>
                <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
        -->
        <div id="carousel-destaques" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
          <li data-target="#carousel-destaques" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-destaques" data-slide-to="1"></li>
          <!--
          <li data-target="#carousel-destaques" data-slide-to="2"></li>
          <li data-target="#carousel-destaques" data-slide-to="3"></li>
          <li data-target="#carousel-destaques" data-slide-to="4"></li>
          -->
          </ol>
  		<div class="carousel-inner">
   <?php
	$query_slide1 = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'capa',
				'field'    => 'slug',
				'terms'    => 'slide-1',
			),
		), 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => '1');
	$loop_slide1 = new WP_Query( $query_slide1 );
	?>
	<?php // The Loop
	if ( $loop_slide1->have_posts() ) {
		while ( $loop_slide1->have_posts() ) {
		$loop_slide1->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide');
			$src = $thumb['0'];
	?>
    <?php $post_slide1 = $post->ID; ?>
        <article class="col-12 ultimas carousel-item active">
        	<h7>
					<?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
        	<a href="<?php the_permalink(); ?>">
            <figure class="thumb">
            	<img src="<?php echo $src; ?>" />
            </figure>
            <h1><?php the_title(); ?></h1>
            </a>
        </article>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
   <?php
	$query_slide2 = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'capa',
				'field'    => 'slug',
				'terms'    => 'slide-2',
			),
		), 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => '1');
	$loop_slide2 = new WP_Query( $query_slide2 );
	?>
	<?php // The Loop
	if ( $loop_slide2->have_posts() ) {
		while ( $loop_slide2->have_posts() ) {
		$loop_slide2->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide');
			$src = $thumb['0'];
	?>
    <?php $post_slide2 = $post->ID; ?>
        <article class="col-12 ultimas carousel-item">
        	<h7>
					<?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
        	<a href="<?php the_permalink(); ?>">
            <figure class="thumb">
            	<img src="<?php echo $src; ?>" />
            </figure>
            <h1><?php the_title(); ?></h1>
            </a>
        </article>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
   <?php
	$query_slide3 = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'capa',
				'field'    => 'slug',
				'terms'    => 'slide-3',
			),
		), 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => '1');
	$loop_slide3 = new WP_Query( $query_slide3 );
	?>
	<?php // The Loop
	if ( $loop_slide3->have_posts() ) {
		while ( $loop_slide3->have_posts() ) {
		$loop_slide3->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide');
			$src = $thumb['0'];
	?>
    <?php $post_slide3 = $post->ID; ?>
        <article class="col-12 ultimas carousel-item">
        	<h7>
					<?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
        	<a href="<?php the_permalink(); ?>">
            <figure class="thumb">
            	<img src="<?php echo $src; ?>" />
            </figure>
            <h1><?php the_title(); ?></h1>
            </a>
        </article>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
   <?php
	$query_slide4 = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'capa',
				'field'    => 'slug',
				'terms'    => 'slide-4',
			),
		), 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => '1');
	$loop_slide4 = new WP_Query( $query_slide4 );
	?>
	<?php // The Loop
	if ( $loop_slide4->have_posts() ) {
		while ( $loop_slide4->have_posts() ) {
		$loop_slide4->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide');
			$src = $thumb['0'];
	?>
    <?php $post_slide4 = $post->ID; ?>
        <article class="col-12 ultimas carousel-item">
        	<h7>
					<?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
        	<a href="<?php the_permalink(); ?>">
            <figure class="thumb">
            	<img src="<?php echo $src; ?>" />
            </figure>
            <h1><?php the_title(); ?></h1>
            </a>
        </article>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
   <?php
	$query_slide5 = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'capa',
				'field'    => 'slug',
				'terms'    => 'slide-5',
			),
		), 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => '1');
	$loop_slide5 = new WP_Query( $query_slide5 );
	?>
	<?php // The Loop
	if ( $loop_slide5->have_posts() ) {
		while ( $loop_slide5->have_posts() ) {
		$loop_slide5->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide');
			$src = $thumb['0'];
	?>
    <?php $post_slide5 = $post->ID; ?>
        <article class="col-12 ultimas carousel-item">
        	<h7>
					<?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
        	<a href="<?php the_permalink(); ?>">
            <figure class="thumb">
            	<img src="<?php echo $src; ?>" />
            </figure>
            <h1><?php the_title(); ?></h1>
            </a>
        </article>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
        </div>
        <a class="carousel-control-prev" href="#carousel-destaques" role="button" data-slide="prev">
    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    	<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#carousel-destaques" role="button" data-slide="next">
    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
    	<span class="sr-only">Next</span>
  		</a>
        </div>
        </div>
        </div>
      </section>
      </main>
<?php $loop_mais = new WP_Query (
						array(
						'post_type' => 'post',
						'orderby' => 'date',
						'order' => 'desc',
						'posts_per_page' => '5',
						'post__not_in' => array($post_manchete,$post_notas,$post_destaque2,$post_slide1,$post_slide2,$post_slide3,$post_slide4,$post_slide5),
						'category__not_in' => '2'
						)
	);
// The Loop
if ( $loop_mais->have_posts() ) {
	while ( $loop_mais->have_posts() ) {
	$loop_mais->the_post();
    	$thumb_mais = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ultimas');
		$src = $thumb_mais['0'];
?>
      <main class="container barra-noticia">
      <section class="row lista-noticias">
          <article class="col-12 noticia">
          	<hr />
        	<h7>
					<?php $parentscategory ="";
					foreach((get_the_category()) as $category) {
					if ($category->category_parent == 0) {
					$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
					}
					}
					echo substr($parentscategory,0,-2); ?></h7>
        	<a href="<?php the_permalink(); ?>">
            <figure class="thumb col-6 col-md-4">
            	<img src="<?php echo $src; ?>" />
            </figure>
            <h1 class="col-6 col-md-8"><?php the_title(); ?>
                   <span class="resumo">
					<?php
					$post_ultimas2 = $loop_mais->post;
					$descrip_ultimas = strip_tags($post_ultimas2->post_content);
					$descrip_ultimas_more = '';
					if (strlen($descrip_ultimas) > 155) {
						$descrip_ultimas = substr($descrip_ultimas,0,200);
						$descrip_ultimas_more = '...';
					}
					$descrip_ultimas = str_replace('"', '', $descrip_ultimas);
					$descrip_ultimas = str_replace("'", '', $descrip_ultimas);
					$descrip_ultimaswords = preg_split('/[\n\r\t ]+/', $descrip_ultimas, -1, PREG_SPLIT_NO_EMPTY);
					array_pop($descrip_ultimaswords);
					$descrip_ultimas = implode(' ', $descrip_ultimaswords) . $descrip_ultimas_more;
					echo $descrip_ultimas;
					?>
                    </span>
            </h1>
            </a>
          </article>
      </section>
      </main>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
</div>
    
<?php get_footer(); ?>