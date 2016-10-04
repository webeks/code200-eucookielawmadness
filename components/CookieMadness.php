<?php

use Cms\Classes\ComponentBase;

class CookieMadness extends ComponentBase
{
    /**
     * Component Registration
     *
     * @return  array
     */
    public function componentDetails()
    {
        return [
            'name'        => 'Related Posts',
            'description' => 'Provides related blog posts'
        ];
    }
}