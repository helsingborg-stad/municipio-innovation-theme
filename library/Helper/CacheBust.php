<?php

namespace (#theme_namespace#)\Helper;

class CacheBust
{
    /**
     * Returns the revved/cache-busted file name of an asset.
     */
    public static function name($name)
    {
        static $revManifest;
        if (!isset($revManifest)) {
            $revManifestPath =
                get_stylesheet_directory() . '/assets/dist/manifest.json';
            if (file_exists($revManifestPath)) {
                $revManifest = json_decode(
                    file_get_contents($revManifestPath),
                    true
                );
            } elseif (WP_DEBUG) {
                echo '<div style="color:red">Error: Assets not built. Go to ' .
                    get_stylesheet_directory() .
                    ' and run gulp. See ' .
                    get_stylesheet_directory() .
                    '/README.md for more info.</div>';
            }
        }
        return $revManifest[$name];
    }
}
