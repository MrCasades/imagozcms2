<?php

/*Упрощённая замена стандарноой htmlspecialchars*/

function html($text)
{
	return htmlspecialchars ($text, ENT_QUOTES, 'UTF-8');
}

function htmlecho($text)
{
	echo html($text);
}

//Быстрая сортировка
/*function quickSort(array $arr) {
    $count= count($arr);
    if ($count <= 1) {
        return $arr;
    }
 
    $first_val = $arr[0];
    $left_arr = array();
    $right_arr = array();
 
    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i] <= $first_val) {
            $left_arr[] = $arr[$i];
        } else {
            $right_arr[] = $arr[$i];
        }
    }
 
    $left_arr = quickSort($left_arr);
    $right_arr = quickSort($right_arr);
 
    return array_merge($left_arr, array($first_val), $right_arr);
}
*/

/*Регулярные выражения*/

function markdown2html ($text)
{
	$text = html ($text);// Преобр. форматирование на уровне обычн текста в HTML
	
	/*Загрузка библиотеки Markdown*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/markdown.php';
	//include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/MarkdownInterface.inc.php';

	/*Полужирный текст*/
	//$text = preg_replace ('/__(.+?)__/s', '<strong>$1</strong>', $text);
	//$text = preg_replace ('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);
	
	/*Курсив*/
	//$text = preg_replace ('/_([^_]+)_/', '<em>$1</em>', $text);
	//$text = preg_replace ('/\*([^_]+)\*/', '<em>$1</em>', $text);
	
	/*Преобразование стиля Windows(\r\n) в Unix (\n)*/
	//$text = preg_replace ('/\r\n/', "\n", $text);
	
	/*Преобразование стиля Mac(\r) в Unix (\n)*/
	//$text = preg_replace ('/\r/', "\n", $text);
	
	/*Абзацы*/
	//$text = '<p>' . str_replace ('/\n\n/', '</p><p>', $text) . '</p>';
	
	/*Разрыв строки*/
	//$text = str_replace ('/\n/', '<br>', $text);
	
	/*Гиперссылка формат [текст ссылки](адрес)*/
	//$text = preg_replace ('/\[([^\]]+)]\(([-a-z0-9._~:\/?#@!$&\'()*+,;=%]+)\)/i', '<a href="$2">$1</a>', $text);
	
	return Markdown($text);
}

/*markdown2html для использования в шаблоне*/
	
function echomarkdown ($text)
{
	echo markdown2html ($text);
}

function searchPagesNum($page, $count, $pages_count, $show_link)
{
	// $show_link - это количество отображаемых ссылок;
	// нагляднее будет, когда это число будет парное
	// Если страница всего одна, то вообще ничего не выводим

	if ($pages_count == 1) return false;

	$sperator = ' '; // Разделитель ссылок; например, вставить "|" между ссылками

	// Для придания ссылкам стиля

	$style = 'style="color: #808000; text-decoration: none;"';
	$begin = $page - intval($show_link / 2);
	unset($show_dots); // На всякий случай :)

	// Сам постраничный вывод
	// Если количество отображ. ссылок больше кол. страниц

	if ($pages_count <= $show_link + 1) $show_dots = 'no';

	// Вывод ссылки на первую страницу
	if (($begin > 2) && !isset($show_dots) && ($pages_count - $show_link > 2)) 
	{
		echo '<a '.$style.' href='.$_SERVER['php_self'].'?page=1> |< </a> ';
	}

	for ($j = 0; $j < $page; $j++) 
	{
		// Если страница рядом с концом, то выводить ссылки перед идущих для того,
		// чтобы количество ссылок было постоянным
	
		if (($begin + $show_link - $j > $pages_count) && ($pages_count-$show_link + $j > 0)) 
		{
			$page_link = $pages_count - $show_link + $j; // Номер страницы
	
			// Если три точки не выводились, то вывести
			if (!isset($show_dots) && ($pages_count-$show_link > 1)) 
			{
				echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.($page_link - 1).'><b>...</b></a> ';
				// Задаем любое значение для того, чтобы больше не выводить в начале "..." (три точки)
				$show_dots = "no";
			}

		// Вывод ссылки
			echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.$page_link.'>'.$page_link.'</a> '.$sperator;
		} 

		else continue;
	}

	for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок
	{
		$i = $begin + $j; // Номер ссылки
		// Если страница рядом с началом, то увеличить цикл для того,
		// чтобы количество ссылок было постоянным
	
		if ($i < 1) 
		{
			$show_link++;
			continue;
		}
	
		// Подобное находится в верхнем цикле
		if (!isset($show_dots) && $begin > 1) 
		{
			echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.($i-1).'><b>...</b></a> ';
			$show_dots = "no";
		}
	
		// Номер ссылки перевалил за возможное количество страниц
		if ($i > $pages_count) break;

		if ($i == $page) 
		{
			echo ' <a '.$style.' ><b>'.$i.'</b></a> ';
		} 

		else 
		{
			echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.$i.'>'.$i.'</a> ';
		}

		// Если номер ссылки не равен кол. страниц и это не последняя ссылка
		if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

		// Вывод "..." в конце
		if (($j == $show_link) && ($i < $pages_count)) 
		{
			echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.($i+1).'><b>...</b></a> ';
		}
	}

	// Вывод ссылки на последнюю страницу
	if ($begin + $show_link + 1 < $pages_count) 
	{
		echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.$pages_count.'> >| </a>';
	}

	return true;
} 

/*Функции возвращают длину текста без пробела*/
function lengthText($text)
{
	$textNonSpace=str_replace(array(" "), '', $text); //В переменной заменяем пробелы на пустоту и возвращаем в переменную $textNonSpace
    return mb_strlen($textNonSpace, 'utf-8');
}

function lengthNonSpaceText($text)
{
	echo lengthText($text);
}

function priceText($text, $price, $bonus)
{
	$text = lengthText($text);
    return ($text * $price)/1000 + (($text * $price)/1000) * $bonus;
}