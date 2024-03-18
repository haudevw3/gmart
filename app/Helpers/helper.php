<?php

function trimBothEndsIfMatch($str, $leftFirstChar, $rightLastChar = '')
{
    if (strlen($str) > 1) :
        $str = ltrim($str, $leftFirstChar);
        if (!empty($rightLastChar)) :
            $str = rtrim($str, $rightLastChar);
        else :
            $str = rtrim($str, $leftFirstChar);
        endif;
        return $str;
    endif;
}
