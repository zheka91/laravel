<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($catid) {
        return view("news.index", [
            "newsList" => $this->getNews($catid),
        ]);
    }

    public function show(int $id) {
        return view('news.show');
    }
}
