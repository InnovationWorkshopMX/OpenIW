<?php
/*
** loop-index.php
** Author: Marin Alcaraz
** Mail   <marin@i-w.mx>
** Started on  Fri Jun 20 14:52:09 2014 Marin Alcaraz
** Last update Fri Jun 20 15:22:21 2014 Marin Alcaraz
** Info:
** Éste archivo contiene el loop que agrupa a todos los post por
** orden de publicación
 */
?>
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
     <div class="post">
         <h1>
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </h1>
         <p>
             publicado hace:
             <?php echo human_time_diff( get_the_time('U'),
                        current_time('timestamp')  ) . '.'; ?>
         </p>
         <!-- Ésta funcion está en functions.php
            y trae con formato el número de comentarios -->
         <p><?php get_comment_number(get_the_ID()); ?> </p>
         <div class="post-content">
           <?php the_category(); ?>
           <?php the_content(); ?>
         </div>
     </div><!-- end of post-<?php the_ID(); ?>-->
 <?php endwhile; else: ?>
     <p>No hay post para éste criterio</p>
 <?php endif; ?>
