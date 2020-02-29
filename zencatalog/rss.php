<?php
     // начало программы
     include "rss.inc";           // это собственно класс
     include "conn.inc";           // переменные для открытия базы


   $Rss= new CRss();

   $Rss->Title="Hi-Tech новости, игры, наука, интернет в отражении на imagoz.ru";
   $Rss->Link="https://www.imagoz.ru/";
   $Rss->Copyright="Copyright © 2019 MrCasades. All rights reserved.";
   $Rss->Description="Портал IMAGOZ. Место где мы рассматриваем мир Hi-Tech, игровую индустрию, науку и технику в оригинальном авторском отражении!";
   $Rss->Category = "Разработка программного обеспечения";
   $Rss->Language="ru";

   $Rss->ManagingEditor="info@caseclub.ru";
   $Rss->WebMaster="info@caseclub.ru";
   $Rss->Query="SELECT
                BLOG.title,
                BLOG.description,
                BLOG.link,
                BLOG.date,
                BLOG.category
     FROM BLOG
     ORDER by DATE desc Limit 0,20";

    $Rss->Open($Server,$DataBase,$Login,$Password);
     $Rss->LastBuildDate=date("r");
      // получаем последнюю дату публикации
     $query = "select BLOG.DATE
                        FROM BLOG
          ORDER by BLOG.date desc Limit 0,1";

      $result1 = mysql_query($query)
              or die("FROM blog failed");

      $line = mysql_fetch_array($result1);

      $Date =date("r",strtotime($line[0]));
       mysql_free_result($result1);

      $Rss->LastBuildDate=$Date;
      $Rss->PubDate=$Rss->LastBuildDate;

     $Rss->PrintHeader();
     $Rss->Query();

     while ($line = mysql_fetch_array($Rss->Result))
     {   // для каждой записи выведем
               $Title = $line[0];
               $Description = $line[1];
               $Link=$line[2];
               $PubDate=date("r",strtotime($line[3]));
               $Category=$line[4];
               $Rss->PrintBody($Title,$Link,$Description,$Category,$PubDate);
    }
    $Rss->PrintFooter();
    $Rss->Close();

?>
