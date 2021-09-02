<?php

function productImage($image)
{
    return $image && file_exists('storage/'.$image) ? asset('storage/'.$image) : asset('img/not-available.png');
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