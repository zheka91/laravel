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

    public function create() {
        return view("news.create");
    }

    public function store(Request $request) {
        $request->validate([
            "title" => ["required", "string"],
            "description" => ["required", "string"],
        ]);
        $data = $request->only(["title", "description"]);
        dd($data);
    }
}
