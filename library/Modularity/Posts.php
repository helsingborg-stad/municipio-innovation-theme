<?php
namespace InnovationsPortalen\Modularity;

class Posts
{
    public function __construct()
    {
        add_filter('acf/load_field/key=field_571dfd4c0d9d9', array($this, 'setDefaultViewOnLoad'));
        add_action('acf/save_post', array($this, 'setItemsViewOnSave'));
        add_filter('InnovationsPortalen/Modularity/Posts/gridClasses', array($this, 'postSliderGridClasses'), 10, 3);
    }

    public function postSliderGridClasses($gridClasses, $viewData, $moduleData)
    {
        if (empty($moduleData['meta']['enable_post_slider']) ||
            $moduleData['meta']['enable_post_slider'][0] !== '1') {
            return $gridClasses;
        }

        $gridClasses = array_merge($gridClasses, array(
            '1-column' => 'grid-xs-12',
            '2-column' => 'grid-xs-8 grid-md-6',
            '3-column' => 'grid-xs-8 grid-md-6 grid-md-4',
            '4-column' => 'grid-xs-8 grid-md-5 grid-lg-3',
        ));

        return $gridClasses;
    }

    public static function data($moduleData)
    {
        extract($moduleData);
        $classes = array();
        $data = array();
        
        // Remove current post if exists while in single/singular view
        if (count($posts) > 0 && is_single()
        || count($posts) > 0 && is_singular(get_post_type())) {
            $data['posts'] = array_filter($posts, function ($post) {
                return $post->ID !== get_queried_object_id();
            });
        }

        $data['postsPerPage'] = !empty($meta['posts_count']) ? $meta['posts_count'][0] : 0;
        $data['postCount'] = count($posts);
        $data['columnsPerRow'] = 4;

        $postColumnsFieldObject = get_field_object('posts_columns', $ID);
        if (!empty($posts_columns)
            && !empty($postColumnsFieldObject['choices'])
            && isset($postColumnsFieldObject['choices'][$posts_columns])) {
            $data['columnsPerRow'] = (int) $postColumnsFieldObject['choices'][$posts_columns];
        }

        $gridClasses = array(
            '1-column' => 'grid-xs-12',
            '2-column' => 'grid-xs-12 grid-sm-6',
            '3-column' => 'grid-xs-12 grid-sm-6 grid-md-4',
            '4-column' => 'grid-xs-12 grid-sm-6 grid-lg-3',
        );

        $gridClasses = apply_filters('InnovationsPortalen/Modularity/Posts/gridClasses', $gridClasses, $data, $moduleData);

        if (isset($data['columnsPerRow'])
            && isset($gridClasses[$data['columnsPerRow'] . '-column'])) {
            $data['posts_columns'] = $gridClasses[$data['columnsPerRow'] . '-column'];
        }



        // Post Slider
        if (!empty($meta['enable_post_slider'])
            && $meta['enable_post_slider'][0] === '1') {
            if (isset($data['columnsPerRow'])
                && isset($gridClassesPostSlider[$data['columnsPerRow']])) {
                $data['posts_columns'] = $gridClassesPostSlider[$data['columnsPerRow']];
            }


            $flickityOptions = array(
                'groupCells' => true,
                'cellAlign' => 'left',
                'draggable' => true,
                'wrapAround' => false,
                "pageDots" => false,
                'prevNextButtons' => false,
                'contain' => false,
                'adaptiveHeight' => false,
                'freeScroll' => true
            );

            $data['slider'] = array(
                'flickityOptions' => json_encode($flickityOptions)
            );

            $classes[] = 'post-slider js-post-slider';
        }

        $data['headingContent'] = !empty($meta['module_heading_content']) ? $meta['module_heading_content'][0] : '';
        $data['archiveLinkText'] = !empty($meta['custom_archive_link_text'][0]) ? $meta['custom_archive_link_text'][0] : __('Show all', INNOVATIONSPORTALEN_TEXTDOMAIN);

        $data['classes'] = implode(' ', apply_filters('Modularity/Module/Classes', $classes, $post_type, $moduleData));

        $data['templateOverride'] = $meta['template_override'][0] ?? get_post_type($postId);

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
