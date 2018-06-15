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
<!-- entry_list -->
  <article class="entry_list">

<?php if($posts): foreach($posts as $post): setup_postdata($post); ?>
<!-- entry_list_contents -->
    <div class="entry_list_contents">
      <dl>
        <dt><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt>
        <dd><?php the_time('Y年n月j日 l'); ?></dd>
      </dl>
      <div><?php the_content(); ?></div>
    </div><!-- /entry_list_contents -->
<?php endforeach; endif ?>

<!-- pager -->
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
<!-- /pager -->
  </article><!-- /entry_list -->

<!-- side -->
  <!--div class="side">
      <?php // get_sidebar(); ?>
  </div-->
<!-- side -->
</div>
<!-- ▲ main -->

<?php get_footer(); ?>
