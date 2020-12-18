<?php
namespace InnovationsPortalen\Municipio;

class SiteHeader
{
    public function __construct()
    {
        add_filter('Municipio/header_transparent', array($this, 'setTransparentNavbar'), 20, 1);
    }

    public function setTransparentNavbar($bool)
    {
        if (is_front_page() && get_field('header_transparent', 'option')) {
            return true;
        }

        if (!empty(get_field('header_transparent_post_types', 'option'))) {
            if (get_post_type() && in_array(get_post_type(), get_field('header_transparent_post_types', 'option')) ||
                get_queried_object() && in_array(get_queried_object()->name, get_field('header_transparent_post_types', 'option'))) {
                return true;
            }
        }

        return $bool;
    }
}
