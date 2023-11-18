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
    public function get_user_application()
    {
        return Application::where('id_user', Auth::user()->id)->get();
    }
    public function summ_plus()
    {
        return Application::where('id_user', Auth::user()->id)->where('status', 'Принят')->get();
    }
    public function accept(Request $request)
    {
        Application::where('id', $request->input('id'))->update([
            'status' => 'Принят'
        ]);
        $user = User::where('id', $request->input('id_user'))->first();

        $balance = $user->balance + $request->input('balance');

        User::where('id', $request->input('id_user'))->update([
            'balance' => $balance
        ]);
    }
}
