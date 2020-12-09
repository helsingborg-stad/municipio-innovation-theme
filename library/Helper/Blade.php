<?php

namespace InnovationsPortalen\Helper;

class Blade
{
    /**
     * Returns the revved/cache-busted file name of an asset.
     */
    public static function render($view, $data)
    {
        $view = str_replace('.blade.php', '', $view);
        $viewPaths = array(
            INNOVATIONSPORTALEN_PATH
        );
        $cachePath = WP_CONTENT_DIR . '/uploads/cache/blade-cache';
        $blade = new  \Philo\Blade\Blade($viewPaths, $cachePath);
        return $blade->view()->make($view, $data)->render();
    }
}
