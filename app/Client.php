<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    const title = [
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
    ];
}
