<?php

namespace App;

class Title extends ReadOnlyBase
{
    protected $titles_array = [
        [
            'value' => "mr", 
            'selected' => true, 
            'title' => "Mr",
        ],
        [
            'value' => "ms",
            'selected' => false, 
            'title' => "Ms",
        ],
        [
            'value' => "mrs", 
            'selected' => false, 
            'title' => "Mrs",
        ],
        [
        'value' => "dr",
            'selected' => false,
            'title' => "Dr",
        ],
        [
            'value' => "mx",
            'selected' => false,
            'title' => "Mx",
        ],
        [
            'value' => "Professor",
            'selected' => false,
            'title' => "Ps",
        ],
    ];
}
