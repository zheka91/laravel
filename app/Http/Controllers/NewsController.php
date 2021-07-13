<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller {
    // public function index($catid) {
    //     $newsModel = new News();
    //     return view("news.index", [
    //         "newsList" => $newsModel->getNews($catid),
    //     ]);
    // }
    
    public function index($catid) {
        // $newsModel = new News();
        // return view("news.index", [
        //     "newsList" => $newsModel->getNews($catid),
        // ]);

        $news = News::with('category')
            ->where("category_id", "=", $catid)
			->orderBy('id', 'desc')
			->paginate(4);
		return view('news.index', [
			'newsList' => $news,
			'catid' => $catid
		]);
    }

    // public function show(int $id) {
    //     $newsModel = new News();
    //     return view('news.show', [
    //         "newsList" => $newsModel->getNewsById($id),
    //     ]);
    // }

    public function show(int $id) {
		return view('news.show');
    }

    public function create($catid) {
        return view("news.create", [
            "catid" => $catid,
        ]);
    }

    public function store(Request $request, $catid) {
        // $request->validate([
        //     "title" => ["required", "string"],
        //     "description" => ["required", "string"],
        // ]);
        // $data = $request->only(["title", "description"]);
        // dd($catid);
        
		$data = $request->only(['title', 'description']);
        $data['category_id'] = $catid;
        $data['slug'] = Str::slug($data['title']);
        
        $cat = News::create($data);

		if ($cat) {
            return redirect()->route('news.catid', [
                   "catid" => $catid
            ])
				->with('success', 'Запись успешно создана');
		}

		return back()->with('error', 'Не удалось создать запись');
    }

    public function edit(int $id) {
    	$news = News::with('category')
            ->select(['id', 'title', 'description'])
            ->where("id", "=", $id)
            ->get();

        return view('news.edit', [
        	'news' => $news[0]
		]);
    }
    
    public function update(Request $request, News $news) {
		$data = $request->only(['title', 'description']);
        $data['slug'] = Str::slug($data['title']);
        
        $cat = $news->fill($data)->save();

        if ($cat) {
        	return redirect()->route('news.catid', [
                "catid" => $news->category_id
            ])
				->with('success', 'Запись успешно обновлена');
		}

        return back()->with('error', 'Не удалось обновить запись');
    }
}
