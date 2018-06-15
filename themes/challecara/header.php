<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="author" content="NEO ZEST(http://neozest.jp)">
<meta name="discription" content="<?php bloginfo( 'description' ); ?>">
<meta name="keywords" content="<?php bloginfo( 'name' ); ?>">
<meta name="robots" content="index,follow">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:image" content="<?php bloginfo( 'template_url' ); ?>/images/ima_ogp.jpg">
<meta property="og:url" content="<?php echo home_url; ?>/">
<meta property="og:site_name" content="<?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="index" title="<?php bloginfo( 'name' ); ?>" href="<?php echo home_url( '/' ); ?>">
<link rel="contents" href="<?php echo home_url( '/' ); ?>sitemap/">
<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
<?php wp_head(); ?>
</head>
<body>



<!-- ▼ header -->
<header id="header">
  <section>
    <h1><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name'); ?></a></h1>
    <aside>
      <div><?php bloginfo( 'description' ); ?></div>
    </aside>
  </section>
</header>
<!-- ▲ header -->



<!-- ▼ noscript && not modern browser -->
<!-- noscript -->
  <noscript><p class="noscript">当サイトは、JavaScriptを有効にすることで快適にご利用いただけます。</p></noscript><!-- /noscript -->
  <!--[if lte IE 9]><div class="nomodern"><p>当サイトは、最新版のブラウザで快適にご利用いただけます。</p></div><![endif]-->
<!-- ▲ noscript && not modern browser -->
