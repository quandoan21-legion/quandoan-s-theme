<?php

namespace Src\Shared\Controllers;

use WP_Post;

interface ILayout
{
    public function renderLayout(WP_Post $post, array $aAtts);
}
