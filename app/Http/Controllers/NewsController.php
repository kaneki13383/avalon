<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NewsController extends Controller
{
    public function create(Request $request)
    {
        $image = $request->file;

        News::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'img' => '../img/' . $image->getClientOriginalName()
        ]);
        $image->move(public_path('img'), $image->getClientOriginalName());
    }

    public function all()
    {
        return News::all();
    }
    public function delete($id)
    {
        News::where('id', $id)->delete();
    }
}
