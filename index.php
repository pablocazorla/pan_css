<?php
  $titlePage = 'Pan CSS';
  $list = [
    array( 'title' => 'Basic',
      'items' => [
        array('title' => 'Text', 'url' => 'text'),
        array('title' => 'Lists', 'url' => 'list'),
        array('title' => 'Table', 'url' => 'table'),
        array('title' => 'Image', 'url' => 'image')
      ]
    ),
    array( 'title' => 'Inputs',
      'items' => [
        array('title' => 'Form inputs', 'url' => 'form'),
        array('title' => 'Buttons', 'url' => 'button')
      ]
    ),
    array( 'title' => 'Components',
      'items' => [
        array('title' => 'Parallax', 'url' => 'parallax')
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
    $menu .= '<ul class="unstyled">';
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
    <title>
      <?php echo $titlePage;?>
    </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/docs.css">
  </head>

  <body>
    <div class="doc-page">
      <div class="doc-head">
        Pan CSS Documentation
      </div>
      <div class="doc-container">
        <div class="doc-sidebar">
          <div id="doc-index">
            
              <?php echo $menu; ?>
            
          </div>
        </div>
        <div class="doc-content">
          <?php include_once('html/'.$current.'.html'); ?>
        </div>
      </div>
    </div>
    <script src="js/libs/jquery-1.11.2.min.js"></script>
    <script src="js/pan.parallax.js"></script>
  </body>

</html>
