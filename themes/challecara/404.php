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



<!-- ▼ main -->
<div class="main">
<!-- error404 -->
  <article class="error404">
<!-- error404_detail -->
    <section class="error404_detail">
      <h2>お探しのページは存在しないようです。</h2>
      <div>下記リンクからページをお探しください。</div>
      <ul id="sitemap_list">
        <li class="home-item"><a href="http://challecara.ezukatechstudio.org" title="九州アプリチャレンジ・キャラバン">九州アプリチャレンジ・キャラバン</a></li>
        <li class="page_item page-item-12"><a href="http://challecara.ezukatechstudio.org/about">九州アプリチャレンジ・キャラバンとは？</a></li>
        <li class="page_item page-item-14"><a href="http://challecara.ezukatechstudio.org/schedule">スケジュール</a></li>
        <li class="cat-item cat-item-3"><a href="http://challecara.ezukatechstudio.org/./news" title="お知らせ">お知らせ</a></li>
        <li class="cat-item cat-item-2"><a href="http://challecara.ezukatechstudio.org/./history" title="これまでの歩み">これまでの歩み</a></li>
        <li class="page_item page-item-18"><a href="http://challecara.ezukatechstudio.org/contact">お問い合わせ</a></li>
        <li class="page_item page-item-112 current_page_item"><a href="http://challecara.ezukatechstudio.org/sitemap">サイトマップ</a></li>
      </ul>
    </section><!-- /error404_detail -->
  </article><!-- /error404 -->

<!-- side -->
  <div class="side">
      <?php get_sidebar(); ?>
  </div><!-- side -->
</div>
<!-- ▲ main -->

<?php get_footer(); ?>