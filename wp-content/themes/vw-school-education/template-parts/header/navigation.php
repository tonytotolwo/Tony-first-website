<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-school-education'); ?></a></div>  
<div id="header" class="menubar">
  <div class="container">
    <div class="row bg-home">
      <div class="col-lg-8 col-md-8 nav">
        <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="socialbox">
          <?php dynamic_sidebar('social-icon') ?>
        </div>
      </div>
      <div class="search-box col-md-1 col-sm-1">
        <span><i class="fas fa-search"></i></span>
      </div>
    </div>
    <div class="serach_outer">
      <div class="closepop"><i class="far fa-window-close"></i></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>