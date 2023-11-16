<?php

namespace App\Http\Controllers;

use App\Jobs\ReturnProfit;
use App\Models\User;
use App\Models\Vklad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VkladController extends Controller
{
    public function create(Request $request)
    {
        if (Auth::user()->balance >= $request->input('summ')) {
            $balance = Auth::user()->balance - $request->input('summ');
            User::where('id', Auth::user()->id)->update([
                'balance' => $balance
            ]);

            $vklad = Vklad::create([
                'id_user' => Auth::user()->id,
                'summ' => $request->input('summ'),
                'itogo' => $request->input('itogo'),
                'profit' => $request->input('profit'),
                'tarif' => $request->input('tarif'),
                'date_end' => $request->input('date_end')
            ]);
        } else {
            $error = 'На балансе недостаточно средств';
            return $error;
        }
    }
    public function end_vklad(Request $request)
    {
        $my_vklad = Vklad::where('date_end', $request->input('date_end'))->first();
        if ($my_vklad->status == 'В процессе') {
            $itogo = Auth::user()->balance + $my_vklad->itogo;
            User::where('id', Auth::user()->id)->update([
                'balance' => $itogo
            ]);
            Vklad::where('date_end', $request->input('date_end'))->update([
                'status' => 'Закрыт'
            ]);
        }
    }
    public function summ_active_deposit()
    {
        return
            DB::select('select * from vklads where id_user = ? and status = ?', [Auth::user()->id, 'В процессе']);
    }
    public function my_vklad()
    {
        return Vklad::where('id_user', Auth::user()->id)->get();
    }
}
