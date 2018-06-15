<?php get_header(); ?>

<!-- ▼ nav -->
<nav>
<?php wp_nav_menu(array(
    'container'  =>'',
    'theme_location' => 'place_global',
  ));
?>
</nav>
<!-- ▲ nav -->



<?php breadcrumb(); ?>



<!-- ▼ main -->
<div class="main">
<?php
if (have_posts()) : 
  while (have_posts()) :
    the_post();
    the_content();
  endwhile;
endif;
?>

<!-- side -->
  <!--div class="side">
      <?php // get_sidebar(); ?>
  </div--><!-- side -->
</div>
<!-- ▲ main -->

<?php get_footer(); ?>
