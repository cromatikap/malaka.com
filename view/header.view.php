<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
    <title><?php echo Lib\Configuration::$websiteName; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Axel LASSEUR" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="https://<?php echo Lib\Configuration::$rootURL; ?>/view/img/icon.png" />


    <link rel="stylesheet" href="<?php echo Lib\Configuration::$rootURL; ?>/view/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Lib\Configuration::$rootURL; ?>/view/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Lib\Configuration::$rootURL; ?>/view/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Lib\Configuration::$rootURL; ?>/view/css/base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Lib\Configuration::$rootURL; ?>/view/css/interrupt.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Lib\Configuration::$rootURL; ?>/view/css/dropzone.css" />
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <?php foreach ($header->getJavascriptTag() as $jsLink) : ?>
    	<script src="<?php echo $jsLink; ?>"></script>
    <?php endforeach; ?>
    <link rel="icon" href="./img/favicon.ico" />
</head>

<body>
    <header>
        <?php include_once(Lib\Configuration::$rootPath . "/analyticstracking.php"); ?>
        <a href="<?php echo Lib\Configuration::$rootURL; ?>">
            <img class="anim-hover-rotate" src="<?php echo Lib\Configuration::$rootURL; ?>/view/img/logo.png" alt="Logo Esperanto" />
        </a>
        <a href="<?php echo Lib\Configuration::$rootURL; ?>">
            <h1><span class="anim-hover-vibrate"><?php echo Lib\Configuration::$websiteName; ?></span></h1>
        </a>
    </header>