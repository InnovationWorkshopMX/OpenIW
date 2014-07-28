<?php
/*
** index.php
** Author: Marin Alcaraz
** Mail   <marin@i-w.mx>
** Started on  Fri Jun 20 14:52:09 2014 Marin Alcaraz
** Last update Mon Jul 28 11:53:46 2014 Marin Alcaraz
** Info:
** Éste archivo contiene el loop que agrupa a todos los post por
** orden de publicación
 */
?>
<?php get_header(); ?>
    <?php get_template_part('loop'); ?>
    <?php get_sidebar(); ?>
<?php get_footer(); ?>
