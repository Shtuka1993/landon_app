<?php

namespace App\Http\Controllers;

use App\Title as Title;

class ClientController extends Controller
{
    public function __construct(Title $titles) {
        $this->titles = $titles->all();
    }

    public function di() {
        dd($this->titles);
    }
}
