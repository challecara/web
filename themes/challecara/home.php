<?php get_header(); ?>
<!-- test home -->
<!-- top_title -->
<div class="top_title">
<!-- top_title_wrap -->
  <div class="top_title_wrap">
<!-- top_title_menu -->
  <section class="top_title_menu">
    <h2><img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" alt="九州アプリチャレンジキャラバン" width="160" height="160"></h2>
    <dl>
      <dt>九州アプリチャレンジキャラバン 2016</dt>
      <dd>
        <div>テーマ：「使う人からつくる人へ」</div>
        <div>公募期間：2016年8月1日～11月30日</div>
      </dd>
    </dl>
    <p>
      <a href="<?php echo home_url( '/' ); ?>/guidelines/#guidelines_schedule">説明会日程</a>
      <!--a href="<?php echo home_url( '/' ); ?>/history/2015">アーカイブ 2015</a-->
      <!--a href="http://challecara.jp/history/2016/%E3%82%B3%E3%83%B3%E3%83%86%E3%82%B9%E3%83%88-2015-%E7%B5%90%E6%9E%9C.html">コンテスト結果</a-->
      <a href="https://docs.google.com/forms/d/1NNeaDF6-h32ukGgJrDCHMlc0HHUAx9US-s7Lcp7iubc/viewform?c=0&w=1" target="_blank">エントリーフォーム</a>
    </p>
  </section><!-- /top_title_menu -->
<!-- top_title_slider -->
  <section class="top_title_slider">
    <ul class="bxslider">
      <li><img src="<?php bloginfo( 'template_url' ); ?>/images/pic_top_title_slider_01.jpg" alt="九州アプリチャレンジキャラバン 画像 1"></li>
      <li><img src="<?php bloginfo( 'template_url' ); ?>/images/pic_top_title_slider_02.jpg" alt="九州アプリチャレンジキャラバン 画像 2"></li>
      <li><img src="<?php bloginfo( 'template_url' ); ?>/images/pic_top_title_slider_03.jpg" alt="九州アプリチャレンジキャラバン 画像 3"></li>
      <li><img src="<?php bloginfo( 'template_url' ); ?>/images/pic_top_title_slider_04.jpg" alt="九州アプリチャレンジキャラバン 画像 4"></li>
      <li><img src="<?php bloginfo( 'template_url' ); ?>/images/pic_top_title_slider_05.jpg" alt="九州アプリチャレンジキャラバン 画像 5"></li>
    </ul>
  </section><!-- /top_title_slider -->
  </div><!-- /top_title_wrap -->
</div><!-- /top_title -->



<!-- ▼ nav -->
<nav>
<?php wp_nav_menu(array(
    'container'  =>'',
    'theme_location' => 'place_global',
  ));
?>
</nav>
<!-- ▲ nav -->



<!-- ▼ main -->
<div class="main">
<!-- top -->
  <article class="top">
<!-- top_news -->
    <div class="top_news">
      <h2>お知らせ</h2>
      <span><a href="<?php echo get_category_link('3'); ?>">もっと読む</a></span>
      <ul>
<?php
  $new_posts = get_posts( array(
  'category_name' => 'news', //特定のカテゴリースラッグを指定*/
  'posts_per_page' => 3 //取得記事件数
  ));
  foreach( $new_posts as $post ):
  setup_postdata( $post );
?>
        <li>
          <a href="<?php the_permalink(); ?>">
            <dl>
              <dt class="date"><?php the_time('Y年n月j日'); ?></dt>
              <dd><?php the_title(); ?></dd>
            </dl>
          </a>
        </li>
<?php
  endforeach;
  wp_reset_postdata();
?>
      </ul>
    </div><!-- /top_news -->
<!-- top_history -->
    <div class="top_history">
      <h2>これまでの歩み</h2>
      <span><a href="<?php echo get_category_link('7'); ?>">もっと読む</a></span>
      <ul>
<?php
  $new_posts = get_posts( array(
  'category_name' => 'year2016', //特定のカテゴリースラッグを指定*/
  'posts_per_page' => 5 //取得記事件数
  ));
  foreach( $new_posts as $post ):
  setup_postdata( $post );
  $content =strip_tags($post-> post_content);
  $content = str_replace(array("&nbsp;","\r\n","\r","\n"),"",$content);
?>
        <li>
          <a href="<?php the_permalink(); ?>">
            <dl>
              <dt>
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { ?>
<img src="<?php echo catch_the_image(); ?>" alt="<?php the_title(); ?>">
<?php } ?>
              </dt>
              <dd>
                <h3><?php the_title(); ?></h3>
                <span class="date"><?php the_time('Y年n月j日'); ?></span>
                <div><?php echo mb_substr($content ,0,160) . '･･･' ?></div>
              </dd>
            </dl>
          </a>
        </li>
<?php
  endforeach;
  wp_reset_postdata();
?>
      </ul>
    </div><!-- /top_history -->
  </article><!-- /top -->

<!-- side -->
  <div class="side">
      <?php // get_sidebar(); ?>
  </div><!-- side -->
</div>
<!-- ▲ main -->

<?php get_footer(); ?>
