<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Room;

class RoomsController extends Controller
{
    public function checkAvailableRooms($clients_id, Request $request) {
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');
        $client = new Client();
        $rooms = new Room();
        
        $data = [
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'rooms' => $rooms->getAvailableRooms($dateFrom, $dateTo),
            'client' => $client->find($clients_id),
        ];
        

        return view('rooms/checkAvailableRooms', $data);
    }
}
