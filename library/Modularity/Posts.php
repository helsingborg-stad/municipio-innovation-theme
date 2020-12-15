<?php
namespace InnovationsPortalen\Modularity;

class Posts
{
    public function __construct()
    {
        add_filter('acf/load_field/key=field_571dfd4c0d9d9', array($this, 'setDefaultViewOnLoad'));
        add_action('acf/save_post', array($this, 'setItemsViewOnSave'));
    }

    public static function data($moduleData)
    {
        extract($moduleData);
        $data = array();

        // Remove current post if exists while in single/singular view
        if (count($posts) > 0 && is_single()
        || count($posts) > 0 && is_singular(get_post_type())) {
            $data['posts'] = array_filter($posts, function ($post) {
                return $post->ID !== get_queried_object_id();
            });
        }

        // Post Slider
        if (!empty($meta['enable_post_slider'])
            && $meta['enable_post_slider'][0] === 1) {
            // Prepare data
        }

        return $data;
    }

    public function setDefaultViewOnLoad($field)
    {
        $field['choices'] = array(
            'items' => $field['choices']['items'],
        );
        $field['default_value'] = $field['choices']['items'];
        return $field;
    }

    public function setItemsViewOnSave($postId)
    {
        if (get_post_type($postId) !== 'mod-posts' || get_field('posts_display_as', $postId) === 'items') {
            return;
        }
        update_field('posts_display_as', 'items', $postId);
    }
}