<?php
namespace InnovationsPortalen\Modularity;

class SectionFeatured
{
    public static function data($moduleData)
    {
        extract($moduleData);
        $classes = array();
        $data = array();

        $gridSizes = array(
            'column-4' => array(
                'image' => 'grid-xs-12 grid-md-7 grid-lg-8',
                'content' => 'grid-xs-12 grid-md-5 grid-lg-4',
            ),
            'column-5' => array(
                'image' => 'grid-xs-12 grid-md-7',
                'content' => 'grid-xs-12 grid-md-5',
            ),
            'column-6' => array(
                'image' => 'grid-xs-12 grid-md-6',
                'content' => 'grid-xs-12 grid-md-6',
            ),
            'column-7' => array(
                'image' => 'grid-xs-12 grid-md-5',
                'content' => 'grid-xs-12 grid-md-7',
            )
        );

        // Default
        $data['columnSizes'] = $gridSizes['column-7'];

        if (!empty($moduleData['meta']['content_column_size'])
        && in_array('column-' . $moduleData['meta']['content_column_size'][0], array_keys($gridSizes))) {
            $data['columnSizes'] = $gridSizes['column-' . $moduleData['meta']['content_column_size'][0]];
        }
        
        return $data;
    }
}
