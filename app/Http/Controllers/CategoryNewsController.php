<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    public function index() {
        return view("category.index", [
            "catList" => $this->getCategory(),
        ]);
    }

    public function create() {
        return view("category.create");
    }

    public function store(Request $request) {
        $request->validate([
            "title" => ["required", "string"],
        ]);
        $data = $request->only(["title"]);
        dd($data);
    }
}
