<?php
namespace InnovationsPortalen;

class App
{
    public function __construct()
    {
        new \InnovationsPortalen\Theme\Enqueue();
    }
}
