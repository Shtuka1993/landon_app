<?php

namespace App\Http\Controllers;

use App\Title as Title;
use Illuminate\Http\Request;
use App\Client as Client;

class ClientController extends Controller
{
    public function __construct(Title $titles) {
        $this->titles = $titles->all();
    }

    public function di() {
        dd($this->titles);
    }

    public function index() {
        $data = [];

        $obj = new \stdClass;
        $obj->id = 1;
        $obj->title = 'mr';
        $obj->name = 'john';
        $obj->last_name = 'doe';
        $obj->email = 'john@domain.com';
  
        $data['clients'][] = $obj;

        $obj = new \stdClass;
        $obj->id = 2;
        $obj->title = 'ms';
        $obj->name = 'jane';
        $obj->last_name = 'doe';
        $obj->email = 'jane@another-domain.com';
        
        $data['clients'][] = $obj;

        return view('client/index', $data);
        //return __METHOD__;
    }

    public function newClient( Request $request, Client $client ) {
        $data = [
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip_code'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'email' => $request->input('email'),
        ];

        if ( $request->isMethod('post') ) {
            //dd($data);
            $this->validate(
                $request,
                [
                    'title' => 'required',
                    'name' => 'required|min:5',
                    'last_name' => 'required',
                    'address' => 'required',
                    'zip_code' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'email' => 'required',
                ]
            );

            $client->insert($data);

            return redirect('clients');
        }
        
        $data['titles'] = $this->titles;
        $data['modify'] = false;

        return view('client/form', $data);
    }

    public function create() {
        
        return view('client/create');
    }

    public function show($client_id) {
        $data = [
            'titles' => $this->titles,
            'modify' => true,
        ];

        return view('client/form', $data);
    }

    public function modify($client_id) {
        
        return __METHOD__ . ':' . $client_id;
    }
}
