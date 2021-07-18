<?php

function productImage($image)
{
    return '/img/'.$image;
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

?>