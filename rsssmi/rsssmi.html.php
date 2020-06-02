<? 
	/*Загрузка функций в шаблон*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

$content = '<?xml version="1.0" encoding="UTF-8"?>

<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">

<channel>
<atom:link href="https://'.$_SERVER['SERVER_NAME'].'/rsssmi.xml" rel="self" type="application/rss+xml"/>

<title>Hi-Tech новости, игры, наука, интернет в отражении на imagoz.ru</title>

<lastBuildDate>'.date("D, j M Y G:i:s", time()).' +0300</lastBuildDate>

<language>ru</language>

<generator>RSS Generator</generator>

<description>

	Портал IMAGOZ. Место где мы рассматриваем мир Hi-Tech, игровую индустрию, науку и технику в оригинальном авторском отражении!

</description>

<link>https://'.$_SERVER['SERVER_NAME'].'/rsssmi.xml</link>

'?>
	
	


	<?php foreach ($newsMain as $newsMain_3): ?>
	
<?php $content .= ' <item>

<title>'. $newsMain_3['newstitle'].'</title>

<description>

<![CDATA[<img src="https://imagoz.ru/images/'.$newsMain_3['imghead'].'"> '.
	
	markdown2html(implode(' ', array_slice(explode(' ', strip_tags($newsMain_3['textnews'])), 0, 50))).' [...]

]]>

</description>

<link>https://'.$_SERVER['SERVER_NAME'].'/viewnews/?id='.$newsMain_3['id'].htmlspecialchars('&', ENT_XML1).'</link>

<pubDate>'.date("D, j M Y G:i:s", strtotime($newsMain_3['newsdate'])).' +0300</pubDate>

<category>технологии</category>

</item> ';?>

<?php endforeach; ?>

<?php foreach ($posts as $post): ?>

<?php $content .= ' <item>

<title>'. $post['posttitle'].'</title>

<description>

<![CDATA[<img src="https://'.$_SERVER['SERVER_NAME'].'/images/'.$post['imghead'].'"> '.
	
	markdown2html(implode(' ', array_slice(explode(' ', strip_tags($post['text'])), 0, 50))).' [...]

]]>

</description>

<link>https://'.$_SERVER['SERVER_NAME'].'/viewpost/?id='.$post['id'].htmlspecialchars('&', ENT_XML1).'</link>

<pubDate>'.date("D, j M Y G:i:s", strtotime($post['postdate'])).' +0300</pubDate>

<category>технологии</category>

</item>';?>

<?php endforeach; ?>

<?php $content .='</channel>

</rss>';

/*Генерация rss-ленты*/
$rssPulse = $_SERVER['DOCUMENT_ROOT'].'/rsssmi.xml';

file_put_contents($rssPulse, $content);

echo 'Файл создан!'

?>