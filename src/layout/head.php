<?php
//variables predeterminadas
$dircss= isset($bootstrapcss) ? $bootstrapcss : '../css/bootstrap.min.css';
$micss= isset($css) ? $css : '../css/style.css';
$myjs = isset($js) ? $js : false;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" href="<?php echo $dircss ?>">
    <link rel="stylesheet" href="<?php echo $micss ?>">
    <?php if($myjs){?>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <?php }?>
    <title><?php echo $title ?></title>
</head>