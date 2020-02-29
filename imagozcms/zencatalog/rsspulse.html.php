<? echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">

<channel>

<title>Hi-Tech новости, игры, наука, интернет в отражении на imagoz.ru</title>

<link>https://imagoz.ru/</link>

<description>

Портал IMAGOZ. Место где мы рассматриваем мир Hi-Tech, игровую индустрию, науку и технику в оригинальном авторском отражении!

</description>
<image>
     <url>https://imagoz.ru/logomain.jpg</url>
</image>

<language>ru</language>
	
	<?php 
	/*Загрузка функций в шаблон*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';?>


	<?php foreach ($newsMain as $newsMain_3): ?>
	
<item>

<title><?php echo $newsMain_3['newstitle']; ?></title>

<link>https://imagoz.ru/viewnews/?id=<?php htmlecho ($newsMain_3['id']); ?></link>

<pubDate><?php echo date("D, j M Y G:i:s", strtotime($newsMain_3['newsdate'])); ?> +0300</pubDate>

<enclosure url="https://imagoz.ru/images/<?php echo $newsMain_3['imghead']; ?>" type="image/jpeg"/>

<description>

<![CDATA[

<?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($newsMain_3['textnews'])), 0, 50))); ?> [...]

]]>

</description>

</item>

<?php endforeach; ?>

<?php foreach ($posts as $post): ?>
	
<item>

<title><?php echo $post['posttitle']; ?></title>

<link>https://imagoz.ru/viewnews/?id=<?php htmlecho ($post['id']); ?></link>

<pubDate><?php echo date("D, j M Y G:i:s", strtotime($post['postdate'])); ?> +0300</pubDate>

<enclosure url="https://imagoz.ru/images/<?php echo $post['imghead']; ?>" type="image/jpeg"/>

<description>

<![CDATA[

<?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($post['text'])), 0, 50))); ?> [...]

]]>

</description>

</item>

<?php endforeach; ?>

</channel>

</rss>