<?php
//variables predeterminadas
$dircss= isset($bootstrapcss) ? $bootstrapcss : '..css/bootstrap.min.css';
$micss= isset($css) ? $css : '..css/style.css';
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo $dircss ?>">
    <link rel="stylesheet" href="<?php echo $micss ?>">
    <title><?php echo $title ?></title>
</head>