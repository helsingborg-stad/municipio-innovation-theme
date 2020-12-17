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

        return $bool;
    }
}
