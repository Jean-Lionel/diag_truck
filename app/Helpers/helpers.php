<?php


 function setActive($route){
    return request()->is($route) ? 'active' : '';
 }
