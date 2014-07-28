<?php
/*
** functions.php
** Author: Marin Alcaraz
** Mail   <marin@i-w.mx>
** Started on  Fri Jun 20 15:06:39 2014 Marin Alcaraz
** Last update Mon Jul 28 11:36:57 2014 Marin Alcaraz
 */

//Activar soporte para RSS
add_theme_support('automatic-feed-links');

//Trae los comentarios de un post con formato, recibe el id del post
function get_comment_number($post_id)
{
    if (!$post_id)
    {
        echo ("[-]Error at: get_comment_number-> Invalid post ID");
        return ;
    }
    else
    {
        if (($num_comments = comments_open()))
        {
            if ($num_comments == 0)
               $comments = ('No hay comentarios');
            elseif ($num_comments > 1)
               $comments = $num_comments . __(' comentarios');
            else
               $comments = __('1 comentario');
            $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
        }
        else
            $write_comments =  __('Comments are off for this post.');
    }
}

//Obtener número de visitas
function get_post_views($post_id)
{
    if (!$post_id)
    {
        echo ("[-]Error at: get_post_views-> Invalid post ID");
        return ;
    }
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if($count == '')
    {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        return "0 visitas";
    }
    return $count.' visitas';
}

//Asignar número de visitas
function set_post_views($post_id) {
    if (!$post_id)
    {
        echo ("[-]Error at: set_post_views-> Invalid post ID");
        return ;
    }
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if($count == '')
    {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    }
    else
    {
        $count = $count + 1;
        update_post_meta($post_id, $count_key, $count);
    }
}
