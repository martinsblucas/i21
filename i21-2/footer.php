<div id="footer" class="container-fluid barra-vermelha">
    <main class="container" id="header">
            </button>
            <?php
            wp_nav_menu( array(
            'theme_location'    => 'primary',
            'menu' 				=> 'menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'col-12 map site-map',
            'container_id'      => '',
            'menu_class'        => '',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker()
            ) );
            ?>
    </nav>
    </main>
</div>

<!-- Funções Jquery -->
<script src="<?php bloginfo('template_directory'); ?>/funcoes.js?v=18" /></script>
<?php wp_footer(); ?>   
  </body>
  
</html>