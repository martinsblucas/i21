<?php /* Template Name: Quem somos */ ?>
<?php get_header(); ?>

	<main role="main" class="container">

      <section class="row page">
		<?php
        global $query_string;
		$loop = new WP_Query ($query_string);
		// The Loop
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) {
			$loop->the_post();
			$foto_secretario = get_post_meta($post->ID, 'wpcf-secretario-img', true);
				$ext = ".".pathinfo($foto_secretario, PATHINFO_EXTENSION);
                $secretario_img = str_replace($ext."","-400x320",$foto_secretario);
			$secretario_bio = get_post_meta($post->ID, 'wpcf-secretario-bio', true);
			$equipe = get_post_meta($post->ID, 'wpcf-equipe', true);
        ?>
        <article class="col-12 col-md-12 col-lg-7 materia">
			<h1><?php the_title(); ?></h1>
            <div class="texto">
            <?php the_content(); ?>
            </div>
        </article>
        <div class="col-12 col-md-12 col-lg-5" style="background-color: #EFEFEF; padding: 0 15px; margin: 0 0px;">
        <article class="notas-internacionais">
        	<hr />
            <h7><a>Biografia</a></h7>
            <div class="row">
            <div class="col-6 col-md-8 col-lg-7">
            	<h2>Secretário de Política e Relações Internacionais</h2>
            	<span class="resumo"><?php echo $secretario_bio; ?></span>
            </div>
            <div class="col-6 col-md-4 col-lg-5">
            	<figure>
            		<img src="<?php echo $secretario_img . $ext; ?>" />
            	</figure>
            </div>
            </div>
        </article>
        <article class="notas-internacionais">
        	<hr />
            <h7><a>Equipe</a></h7>
            <div class="row">
            <div class="col-12">
            	<span class="resumo2"><?php echo wpautop( wptexturize( $equipe ) ); ?></span>
            </div>
            </div>
        </article>
        </div>
        <?php	}
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
      </section>
    </main>
<?php get_footer(); ?>