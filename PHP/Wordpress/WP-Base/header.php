<?php
/*
** header.php
** Author: Marin Alcaraz
** Mail   <marin@i-w.mx>
** Started on  Fri Jun 20 15:06:39 2014 Marin Alcaraz
** Last update Mon Jul 28 11:56:58 2014 Marin Alcaraz
 */?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <title>
        <?php bloginfo('name'); ?> <?php wp_title(); ?>
    </title>
    <meta <?php bloginfo("charset"); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>
<div class="wrapper">
    <div class="header">
        <h1>
            <a href="<?php bloginfo('url') ?>/">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
    </div><!-- end of header -->
