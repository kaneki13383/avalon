<?php

namespace App\Http\Controllers;

use App\Models\OutputBalance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class OutputBalanceController extends Controller
{
    public function create(Request $request)
    {
        $balance = Auth::user()->balance - $request->input('summ');

        User::where('id', Auth::user()->id)->update([
            'balance' => $balance
        ]);
        OutputBalance::create([
            'id_user' => Auth::user()->id,
            'summ' => $request->input('summ'),
            'card' => $request->input('card'),
            'bank' => $request->input('bank'),
            'status' => 'В обработке'
        ]);
    }
    public function get_user_outputbalance()
    {
        return OutputBalance::where('id_user', Auth::user()->id)->get();
    }
    public function summ_minus()
    {
        return OutputBalance::where('id_user', Auth::user()->id)->where('status', 'Завершен')->get();
    }
    public function all()
    {
        return OutputBalance::all();
    }
    public function accept(Request $request)
    {
        OutputBalance::where([
            'id' => $request->input('id')
        ])->update([
            'status' => 'Завершен'
        ]);
    }
}
