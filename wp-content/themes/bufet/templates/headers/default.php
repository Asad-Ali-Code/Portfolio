<header id="sticker" <?php echo bufet_header_classes(); ?>>
  <nav class="navbar">
    <div class="container">
      <div class="navbar-header">

                <?php
                    printf( '<a href="%s"  class="navbar-brand">', esc_url( home_url('/') ) );
                        echo bufet_get_site_logo();
                    echo '</a>';
                ?>

        </div>
      <div  id="navigation">
          <div class="menu-main-menu-container">

            <?php
                if( function_exists('wp_nav_menu') ) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'menu_id' => 'mainmenu',
                        'fallback_cb'  => 'bufet_link_to_menu_editor',
                        'walker'       =>  new Bufet_Nav_Menu_Walker,
                    ));
                }
            ?>
        </div>
      </div>
    </div>
  </nav>
</header>
