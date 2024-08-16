<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\API\Yandex\AgencyClientApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Yandex\AgencyClientRequest;

class AgencyClientController extends Controller
{
    public function index() {

        $clients = new AgencyClientApiController;
        $clients = $clients->get();
        
        dd($clients);
    }

    public function create(){
        return view('web.form', []);
    }

    public function store(AgencyClientRequest $request){

        $client = new AgencyClientApiController;
        $client = $client->add($request->validated());

        if ($client['status'] == 'Error'){
            return redirect()->route('agens-clients-create')->with('error', $client['data']);
        }

        return redirect()->route('agens-clients-get');
    }

    public function show(){}
    public function edit(){}
    public function update(){}
    public function destroy(){}

}
