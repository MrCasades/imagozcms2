<? 
	/*Загрузка функций в шаблон*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

$content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc>https://'.$_SERVER['SERVER_NAME'].'/</loc>
	  <lastmod>2020-01-01</lastmod>
	  <priority>1.0</priority>
   </url>
   <url>
      <loc>https://'.$_SERVER['SERVER_NAME'].'/cooperation/</loc>
	  <lastmod>2020-01-01</lastmod>
	  <priority>0.65</priority>
   </url>
   <url>
      <loc>https://'.$_SERVER['SERVER_NAME'].'/promotion/</loc>
	  <lastmod>2020-01-01</lastmod>
	  <priority>0.65</priority>
   </url>
'?>
	
<?php foreach ($newsMain as $news): ?>
	
<?php $content .= '<url>
      <loc>https://'.$_SERVER['SERVER_NAME'].'/viewnews/?id='.$news['id'].'</loc>
	  <lastmod>'.date("Y-m-d", strtotime($news['newsdate'])).'</lastmod>
	  <priority>0.8</priority>
   </url>';?>

<?php endforeach; ?>

<?php foreach ($posts as $post): ?>

<?php $content .= '<url>
      <loc>https://'.$_SERVER['SERVER_NAME'].'/viewpost/?id='.$post['id'].'</loc>
	  <lastmod>'.date("Y-m-d", strtotime($post['postdate'])).'</lastmod>
	  <priority>0.8</priority>
   </url>';?>

<?php endforeach; ?>

<?php foreach ($promotions as $promotion): ?>

<?php $content .= '<url>
      <loc>https://'.$_SERVER['SERVER_NAME'].'/viewpromotion/?id='.$promotion['id'].'</loc>
	  <lastmod>'.date("Y-m-d", strtotime($promotion['promotiondate'])).'</lastmod>
	  <priority>0.75</priority>
   </url>';?>

<?php endforeach; ?>

<?php foreach ($authors as $author): ?>

<?php $content .= '<url>
      <loc>https://'.$_SERVER['SERVER_NAME'].'/account/?id='.$author['id'].'</loc>
	  <lastmod>'.date("Y-m-d", strtotime($author['regdate'])).'</lastmod>
	  <priority>0.7</priority>
   </url>';?>

<?php endforeach; ?>

<?php $content .='</urlset>';

/*Генерация rss-ленты*/
$sitemap = 'sitemap.xml';

file_put_contents($sitemap, $content);

echo 'Файл sitemap создан!'

?>