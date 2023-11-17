<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function create(Request $request)
    {
        Application::create([
            'id_user' => Auth::user()->id,
            'summ' => $request->input('summ'),
            'bank' => $request->input('bank'),
            'name' => Auth::user()->name
        ]);
    }
    public function get()
    {
        return Application::all();
    }
    public function accept(Request $request)
    {
        Application::where('id', $request->input('id'))->update([
            'status' => 'Принят'
        ]);
        $user = User::where('id', $request->input('id'))->first();

        $balance = $user->balance + $request->input('balance');

        User::where('id', $request->input('id'))->update([
            'balance' => $balance
        ]);
    }
}
