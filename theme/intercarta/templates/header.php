<header class="banner">
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar top-bar"></span>
              <span class="icon-bar middle-bar"></span>
              <span class="icon-bar bottom-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
              <?php
              if (get_field('option_logo', 'option')) :
                echo '<img alt="Papel acoplado - Embalagem DualFresh® / Intercarta" src="' . get_field('option_logo', 'option') . '">';
              else :
                bloginfo('name');
              endif;
              ?>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary nav navbar-nav']);
          endif;
          ?>
          <?php
            if (has_nav_menu('button_navigation')) :
              wp_nav_menu(['theme_location' => 'button_navigation', 'menu_class' => 'nav-button nav navbar-nav navbar-right']);
            endif;
          ?>

        </div>
      </div>
    </nav>
  </div>
</header>
