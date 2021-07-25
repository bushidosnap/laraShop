<?php

function productImage($image)
{
    return '/img/'.$image;
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function setPrice($price)
{
    $temp = (float)$price;
    $val = sprintf('%01.2f', $temp / 100);
    return '$'.$val;
}

?>