<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarksController extends Controller
{
    public function store(Request $request, $id){
        \Auth::user()->bookmark($id);
        return back();
    }
    public function destroy($id){
        \Auth::user()->unbookmark($id);
        return back();
    }
}
