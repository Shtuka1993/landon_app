<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function checkAvailableRooms($clients_id) {
        return view('rooms/checkAvailableRooms');
    }
}
