<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP 101</title>
  <link rel='stylesheet' href='style.css'/>

  <?php
  // if (isset($currentPage)) {
  //     if ($currentPage == "news") {
  //       echo "<link rel='stylesheet' href='news.css'/>";
  //     }
  //
  //     if ($currentPage == "home") {
  //       echo "<link rel='stylesheet' href='home.css'/>";
  //     }

      //convert into switch statement
      //DRY
  // }
//   switch ($currentPage) {
//     case "news":
//         $styleSheet = 'news.css';
//         break;
//     case "home":
//         $styleSheet = 'home.css';
//         break;
// }

if(isset($currentPage)){
  echo "<link rel='stylesheet' href='" .$currentPage. ".css' />" ;
}

  ?>
</head>
<body>
