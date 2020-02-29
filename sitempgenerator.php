<?php
// Содержимое будет храниться в переменной $Sitemap
//Для начала запишем в переменную стандартный заголовок 
$Sitemap="<?xml version="1.0" encoding="UTF-8"?>";

//Далее следует обязательные тег <urlset> содержащий атрибут xmlns 
//с адресом страницы со стандартами протокола Sitemap
//Все страницы веб-сайта будут помещаться в данный тег
$Sitemap.="<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">";

//Каждый URL-адрес помещается в обязательный тег <url>
$Sitemap.="<url>";
//Парный тег <loc> содержит адрес веб-страницы
$Sitemap.="<loc>http://www.website.uz/page1</loc>";
//Парный тег < lastmod > содержит последнее изменение веб-страницы
$Sitemap.="<lastmod>2012-04-12</lastmod>";
$Sitemap.="</url>";

//Аналогично добавляются и остальные страницы веб-сайта
$Sitemap.="<url>";
$Sitemap.="<loc>http://www.website.uz/page2</loc>";
$Sitemap.="<lastmod>2012-04-10</lastmod>";
$Sitemap.="</url>";

//После того как все страницы было внесены необходимо закрыть тег <urlset>
$Sitemap.="</urlset>";