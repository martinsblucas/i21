<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml"><head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content='IE=9' http-equiv='X-UA-Compatible'/>
	<meta content='IE=EmulateIE7' http-equiv='X-UA-Compatible'/>
    
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index, follow" />
    <META NAME="description" CONTENT="<?php $page_id = $post->post_name; if(is_home() or $page_id == "sobre") { ?><?php bloginfo("description") ?><?php } elseif(is_single()) { ?><?php
    $post = $wp_query->post;
    $descrip = strip_tags($post->post_content);
    $descrip_more = '';
    if (strlen($descrip) > 155) {
        $descrip = substr($descrip,0,400);
        $descrip_more = ' ...';
    }
    $descrip = str_replace('"', '', $descrip);
    $descrip = str_replace("'", '', $descrip);
    $descripwords = preg_split('/[\n\r\t ]+/', $descrip, -1, PREG_SPLIT_NO_EMPTY);
    array_pop($descripwords);
    $descrip = implode(' ', $descripwords) . $descrip_more;
    echo $descrip;
    ?><?php } elseif($page_id == "links") { ?>Confira uma lista de links de partidos, entidades e agências de notícias anti-imperialistas<?php } else { ?><?php bloginfo("description") ?><?php } ?>">
    <META NAME="keywords" CONTENT="Internacionalismo, Relações Internacionais, PCdoB, Política, Esquerda, Socialismo, Comunismo, Revolução, Solidariedade, Resistência, Notícias, Artigos, Matérias, Notas, Geopolítica, Anti-Imperalismo<?php if(is_single()) { ?><?php $cats = get_the_category($post->ID); if ($cats) { foreach($cats as $cat) { $categoria = strtolower($cat->name); echo ", ".$categoria; } } ?><?php } ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" charset="<?php bloginfo('charset'); ?>" />
    
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>"/>
    <meta property="og:image" content="<?php if (is_home () or is_page()) { ?><?php bloginfo('template_directory'); ?>/img/compartilhar_face.jpg?v=3<?php } elseif (has_post_thumbnail()) { ?><?php $thumb_grande = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); $url_grande = $thumb_grande['0']; echo $url_grande; ?><?php } else { ?><?php bloginfo('template_directory'); ?>/img/compartilhar_face.jpg<?php } ?>"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:description" content="<?php $page_id = $post->post_name; if(is_home() or $page_id == "sobre") { ?><?php bloginfo("description") ?><?php } elseif(is_single()) { ?><?php
    $post = $wp_query->post;
    $descrip = strip_tags($post->post_content);
    $descrip_more = '';
    if (strlen($descrip) > 155) {
        $descrip = substr($descrip,0,400);
        $descrip_more = ' ...';
    }
    $descrip = str_replace('"', '', $descrip);
    $descrip = str_replace("'", '', $descrip);
    $descripwords = preg_split('/[\n\r\t ]+/', $descrip, -1, PREG_SPLIT_NO_EMPTY);
    array_pop($descripwords);
    $descrip = implode(' ', $descripwords) . $descrip_more;
    echo $descrip;
    ?><?php } elseif($page_id == "links") { ?>Confira uma lista de links de partidos, entidades e agências de notícias anti-imperialistas<?php } else { ?><?php bloginfo("description") ?><?php } ?>"/>
    <meta property="og:type" content="<?php if (is_single()) { ?>article<?php } else { ?>website<?php } ?>"/>
    <link rel="canonical" href="<?php bloginfo("url"); ?>" />
    <meta property="fb:app_id" content="353265085217538" />
    <!-- Metas do Face -->
    
    <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900" rel="stylesheet">
    <!-- Fonte Cairo -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fontes/awesome/css/all.css?v=2">
    <!-- Fonte Awesome -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fontes/swiss/stylesheet.css" type="text/css" media="screen,projection" />
    <!-- Fonte Swiss -->
    
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/fav/favicon-16.png?v=7" sizes="16x16">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/fav/favicon-32.png?v=7" sizes="32x32">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/fav/favicon-48.png?v=5" sizes="48x48">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/fav/favicon-64.png?v=5" sizes="64x64">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/fav/favicon-128.png?v=5" sizes="128x128">
    <link rel="image_src" type="image/jpeg" href="img_path" />
    <!-- Favicons -->

    <?php wp_head(); ?>

  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  </head>
  
  <body <?php body_class(); ?>>

	<div class="container-fluid barra">
        <div class="container">
            <figure class="logo_pcdob">
            	<img src="<?php bloginfo("template_directory"); ?>/img/logo_pc.png" />
            	<figcaption>Secretaria de Política e Relações Internacionais</figcaption>
            </figure>
          <div class="navbar-right d-none d-md-block d-lg-block">
          <form class="search-form" id="searchform" role="search" method="get" action="<?php bloginfo("url"); ?>">
                    <div class="form-group pull-right" id="search">
                      <input type="text" class="form-control" placeholder="Pesquisar" name="s" id="s" value="<?php the_search_query(); ?>">
                      <button type="submit" id="searchsubmit" class="form-control form-control-submit">Submit</button>
                      <span class="search-label"><i class="fas fa-search"></i></span>
                    </div>
                  </form>
          </div>
        </div>
    </div>
    <main class="container topo">
    	<header class="row" id="header">
           	<div class="col-3">
            <div class="d-none d-md-block ver-menu">
            <?php 
			if (is_home()) {
				$link = get_bloginfo('url') . "/?v=2";
			}
			elseif (is_search()) {
				$pre = get_bloginfo('url');
				$search = get_search_query();
				$after = "&v=2";
				$link = $pre . "/?s=" . $search . $after;
			}
			elseif (is_archive()) {
				$pre = get_bloginfo('url');
				if (is_category()) {
					$cat = get_queried_object();
    				$search = $cat->slug;
					$after = "/editoria/" . $search;
				}
				elseif(is_tag()) {
					$tag = get_queried_object();
    				$search = $tag->slug;
					$after = "/tema/" . $search;
				}
				$link = $pre . $after . "/?v=2";
			}
			else {
				$link = get_the_permalink() . "?v=2";
			}
			?>
            <a href="<?php echo $link; ?>"><i class="fas fa-ellipsis-v"></i></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation"></button>
            </div>
            <figure class="navbar-brand col-6"><a href="<?php bloginfo('url'); ?><?php $_GET["v"] = $v; if ($v === 2) { echo "/?v=2"; } else { } ?>"><img src="<?php bloginfo("template_directory"); ?>/img/logo.jpg?v=3" /></a></figure>
            <div class="col-3 redes">
            	<a href="http://fb.me/internacionalismoseculo21" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/internacionalismo21/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/internaciona_21" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>
        </header>
    </main>
    <div class="container-fluid barra-menu">
    <div class="container-fluid barra-vermelha">
    <main class="container" id="header">
    <nav class="navbar navbar-expand-md col-12" role="navigation">
    <div class="navbar-right d-block d-md-none d-lg-none">
                  <form class="search-form-m" id="searchform" role="search" method="get" action="<?php bloginfo("url"); ?>">
                    <div class="form-group pull-right" id="search">
                      <input type="text" class="form-control" placeholder="Pesquisar" name="s" id="s" value="<?php the_search_query(); ?>">
                      <button type="submit" id="searchsubmit" class="form-control form-control-submit">Submit</button>
                      <span class="search-label"><i class="fas fa-search"></i></span>
                    </div>
                  </form>
                  </div>
            <?php
            wp_nav_menu( array(
            'theme_location'    => 'primary',
            'menu' 				=> 'menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
                        ?>
    </nav>
    </main>
    </div>
    </div>