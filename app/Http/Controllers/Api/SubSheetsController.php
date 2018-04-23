<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\SubSheet;

class SubSheetsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');
        return $search ?SubSheet::where('name','LIKE', '%'.$search.'%')->get():[];
    }
}
