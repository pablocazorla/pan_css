<?php
  $titlePage = 'Pan CSS';
  $list = [
    array( 'title' => 'Basic',
      'items' => [
        array('title' => 'Text', 'url' => 'text'),
        array('title' => 'Lists', 'url' => 'list'),
        array('title' => 'Table', 'url' => 'table'),
        array('title' => 'Image', 'url' => 'image'),
        array('title' => 'Text helpers', 'url' => 'text-helpers')
      ]
    ),
    array( 'title' => 'Inputs',
      'items' => [
        array('title' => 'Form inputs', 'url' => 'form'),
        array('title' => 'Buttons', 'url' => 'button')
      ]
    ),
    array( 'title' => 'Layout',
      'items' => [
        array('title' => 'Grid', 'url' => 'grid')
      ]
    )
   
   
  ];

  /******************************************************************************/
  $isPage = false;
  if( isset($_GET['p']) ) {
    $isPage = true;
    $current =  $_GET['p'];
  }else{
    $current = 'welcome';
  }
  // Create the menu
  $menu = '';
  $existsCurrent = false;
  for ($i = 0; $i < count($list); $i++) {
    $menu .= '<div class="doc-group">';
    $menu .= '<h3 class="h3">'.$list[$i]['title'].'</h3>';
    $menu .= '<ul>';
    for ($j = 0; $j < count($list[$i]['items']); $j++) {
      $url = $list[$i]['items'][$j]['url'];
      $isActive = '';
      $href = ' href="?p='.$url.'"';
      if($url == $current){
        $existsCurrent = true;
        $isActive = ' class="active"';
        $href = '';
        $titlePage .= ' | ' . $list[$i]['items'][$j]['title'];
      }
      $menu .= '<li>';
      $menu .= '<a'.$href.$isActive.'>'.$list[$i]['items'][$j]['title'].'</a>';

      $menu .= '</li>';

    }
    $menu .= '</ul>';
    $menu .= '</div>';
  }
  if(!$existsCurrent){
    $current = 'welcome';
  }
?>
<!doctype HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $titlePage;?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="doc-page">
  	<div class="container">
      <div class="row gap-0">
        <div class="col col-1-5">
          <div id="doc-index">
            <p><?php echo $menu; ?></p>
          </div>
        </div>
        <div class="col col-4-5">
          <div id="doc-content" class="clearfix">
            <?php include_once('html/'.$current.'.html'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>