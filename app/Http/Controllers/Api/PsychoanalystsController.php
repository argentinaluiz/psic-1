<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Psychoanalyst;

class PsychoanalystsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');

        return $search ?Psychoanalyst::whereHas('user', function($query) use($search){
            $query->where('users.name', 'LIKE', '%'.$search.'%');
        })->take(10)->get():[];
    }

}
