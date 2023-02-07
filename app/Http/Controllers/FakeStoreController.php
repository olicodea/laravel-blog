<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class FakeStoreController extends Controller
{
    public function inicio()
    {
        $position = "";
        return view('fakeStore.fakeStore', compact('position'));
    }
}
