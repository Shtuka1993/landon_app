<?php

namespace App\Http\Controllers;

use App\Title as Title;
use Illuminate\Http\Request;
use App\Client as Client;

class ClientController extends Controller
{
    public function __construct(Title $titles, Client $client) {
        $this->titles = $titles->all();
        $this->client = $client; 
    }

    public function di() {
        dd($this->titles);
    }

    public function index() {
        $data = [];

        $data['clients'] = $this->client->all();

        return view('client/index', $data);
        //return __METHOD__;
    }

    public function newClient( Request $request ) {
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

            $this->client->insert($data);

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
        $client_data = $this->client->find($client_id);
        $data['name'] = $client_data->name;
        $data['last_name'] = $client_data->last_name;
        $data['address'] = $client_data->address;
        $data['zip_code'] = $client_data->zip_code;
        $data['city'] = $client_data->city;
        $data['state'] = $client_data->state;
        $data['email'] = $client_data->email;
        $data['client_id'] = $client_id;

        return view('client/form', $data);
    }

    public function modify( Request $request, $client_id ) {
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

            $client_data = $this->client->find($client_id);

            $client_data->title = $request->input('title');
            $client_data->name = $request->input('name');
            $client_data->last_name = $request->input('last_name');
            $client_data->address = $request->input('address');
            $client_data->zip_code = $request->input('zip_code');
            $client_data->city = $request->input('city');
            $client_data->state = $request->input('state');
            $client_data->email = $request->input('email');

            $client_data->save();

            return redirect('clients');
        }
    }
}
