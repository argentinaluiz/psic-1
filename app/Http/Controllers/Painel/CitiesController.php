<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\City;
use App\Models\Painel\State;

class CitiesController extends Controller
{
    
    private $stateModel;
    
    public function __construct(State $state)
    {
        $this->stateModel = $state;
    }

    
    public function index(State $state)
    {

        //$cities   = $state->cities;
       // return $cities;
       $cities = $state->cities()->getQuery()->get(['id', 'name']);
        return Response::json($cities);
    }

}
