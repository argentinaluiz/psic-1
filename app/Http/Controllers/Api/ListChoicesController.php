<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\ListChoice;

class ListChoicesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');

        return $search ?ListChoice::where('name','LIKE', '%'.$search.'%')->get():[];

    }
}
