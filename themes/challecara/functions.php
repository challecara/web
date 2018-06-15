<?php

// ▼ カスタムメニュー
register_nav_menus(
  array(
    'place_global' => 'グローバル',
  )
);
// ▼ アイキャッチ画像
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(168, 168);
// ▼ ページネーション
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination clearfix\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
// ▼ カテゴリーごとの月別アーカイブ
add_filter('getarchives_where', 'custom_archives_where', 10, 2);
add_filter('getarchives_join', 'custom_archives_join', 10, 2);

function custom_archives_join($x, $r) {
  global $wpdb;
  $cat_ID = $r['cat'];
  if (isset($cat_ID)) {
    return $x . " INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)";
  } else {
    return $x;
  }
}

function custom_archives_where($x, $r) {
  global $wpdb;
  $cat_ID = $r['cat'];
  if (isset($cat_ID)) {
    return $x . " AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.term_id IN ($cat_ID)";
  } else {
    $x;
  }
}

function wp_get_cat_archives($opts, $cat) {
  $args = wp_parse_args($opts, array('echo' => '1')); // default echo is 1.
  $echo = $args['echo'] != '0'; // remember the original echo flag.
  $args['echo'] = 0;
  $args['cat'] = $cat;

  $tag = ($args['format'] === 'option') ? 'option' : 'li';

  $archives = wp_get_archives(build_query($args));
  $archs = explode('</'.$tag.'>', $archives);
  $links = array();

  foreach ($archs as $archive) {
    $link = preg_replace("/='([^']+)'/", "='$1?cat={$cat}'", $archive);
    array_push($links, $link);
  }
  $result = implode('</'.$tag.'>', $links);

  if ($echo) {
    echo $result;
  } else {
    return $result;
  }
}
// ▼ 記事内の一番最初の画像を取得してサムネイル画像表示
function catch_the_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

if(empty($first_img)){
        $first_img = "http://challecara.ezukatechstudio.org/wp-content/themes/challecara/images/ima_blog_default.png";
    }
    return $first_img;
}
// ▼ パンくずリスト
function breadcrumb(){
  global $post;
  $str ='';
  if(!is_home()&&!is_admin()){ /* !is_admin は管理ページ以外という条件分岐 */
    $str.= '<aside class="bread_nav">';
    $str.= '<ul>';
    $str.= '<li><a href="'. home_url() .'/">HOME</a></li>';
    if(is_search()){
      $str.='<li>「'. get_search_query() .'」で検索した結果</li>';
    } elseif(is_tag()){
      $str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
    } elseif(is_404()){
      $str.='<li>404 Not found</li>';
    } elseif(is_date()){
      if(get_query_var('day') != 0){
        $str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
        $str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
        $str.='<li>'. get_query_var('day'). '日</li>';
      } elseif(get_query_var('monthnum') != 0){
        $str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
        $str.='<li>'. get_query_var('monthnum'). '月</li>';
      } else {
        $str.='<li>'. get_query_var('year') .'年</li>';
      }
    } elseif(is_category()) {
      $cat = get_queried_object();
      if($cat -> parent != 0){
        $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
        foreach($ancestors as $ancestor){
          $str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a></li>';
        }
      }
      $str.='<li>'. $cat -> name . '</li>';
    } elseif(is_author()){
      $str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</li>';
    } elseif(is_page()){
      if($post -> post_parent != 0 ){
      $ancestors = array_reverse(get_post_ancestors( $post->ID ));
        foreach($ancestors as $ancestor){
          $str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
        }
      }
      $str.= '<li>'. $post -> post_title .'</li>';
    } elseif(is_attachment()){
      if($post -> post_parent != 0 ){
        $str.= '<li><a href="'. get_permalink($post -> post_parent).'">'. get_the_title($post -> post_parent) .'</a></li>';
      }
      $str.= '<li>' . $post -> post_title . '</li>';
    } elseif(is_single()){
      $categories = get_the_category($post->ID);
      $cat = $categories[0];
      if($cat -> parent != 0){
        $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
        foreach($ancestors as $ancestor){
          $str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
        }
      }
      $str.='<li><a href="'. get_category_link($cat -> term_id). '">'. $cat-> cat_name . '</a></li>';
      $str.= '<li>'. $post -> post_title .'</li>';
    } else{
      $str.='<li>'. wp_title('', false) .'</li>';
    }
    $str.='</ul>';
    $str.='</aside>';
  }
  echo $str;
}
// ▼ 管理画面にアバター選択画面追加
add_filter( 'avatar_defaults', 'newgravatar' );
function newgravatar ($avatar_defaults) {
  $myavatar = get_bloginfo('template_directory') . '/images/ivanov.png';
  $avatar_defaults[$myavatar] = "ivanov";
  return $avatar_defaults;
}

?>
