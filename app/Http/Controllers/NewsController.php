<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($catid) {
        $newsModel = new News();
        return view("news.index", [
            "newsList" => $newsModel->getNews($catid),
        ]);
    }

    public function show(int $id) {
        $newsModel = new News();
        return view('news.show', [
            "newsList" => $newsModel->getNewsById($id),
        ]);
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
