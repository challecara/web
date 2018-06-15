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
<!-- entry_article -->
  <article class="entry_article">

<?php if($posts): foreach($posts as $post): setup_postdata($post); ?>
<!-- entry_article_contents -->
    <div class="entry_article_contents">
      <dl>
        <dt><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt>
        <dd><?php the_time('Y年n月j日 l'); ?></dd>
      </dl>
      <div><?php the_content(); ?></div>
    </div><!-- /entry_article_contents -->
<?php endforeach; endif ?>

    <ul class="entry_article_link">
<?php if(get_next_post()):?>
      <li>
        <dl>
          <dt>次の記事</dt>
          <dd><?php next_post_link('%link', '%title', true , ''); ?></dd>
        </dl>
      </li>
<?php endif; ?>
<?php if(get_previous_post()):?>
      <li>
        <dl>
          <dt>前の記事</dt>
          <dd><?php previous_post_link('%link', '%title', true , ''); ?></dd>
        </dl>
      </li>
<?php endif; ?>
    </ul>

  </article><!-- /entry_article -->

<!-- side -->
  <!--div class="side">
      <!--?php get_sidebar(); ?-->
  </div--><!-- side -->
</div>
<!-- ▲ main -->

<?php get_footer(); ?>