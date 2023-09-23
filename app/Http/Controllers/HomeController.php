<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $images = Image::query()->with('author')->orderByDesc('id')->paginate(10);
        return view('home', compact('images'));
    }
}
