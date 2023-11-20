<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewsResource;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class ReviewsController extends Controller
{
    public function all()
    {
        return ReviewsResource::collection(Reviews::all());
    }
    public function delete($id)
    {
        Reviews::where('id', $id)->delete();
    }
    public function create(Request $request)
    {
        Reviews::create([
            'id_user' => Auth::user()->id,
            'text' => $request->input('text')
        ]);
    }
}
