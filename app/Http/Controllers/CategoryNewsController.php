<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    // public function index() {
    //     $catModel = new Category();
    //     return view("category.index", [
    //         "catList" => $catModel->getCategories(),
    //     ]);
    // }
    public function index() {
    	$cat = Category::with('news')
		    ->select(['id', 'title', 'description', 'created_at'])
			->orderBy('id', 'desc')
            ->get();
            
        return view('category.index', [
        	'catList' => $cat
		]);
    }

    public function create() {
        return view("category.create");
    }

    public function store(Request $request) {
        $cat = Category::create(
			$request->only(['title', 'color', 'description'])
		);

		if ($cat) {
			return redirect()->route('category')
				->with('success', 'Запись успешно создана');
		}

		return back()->with('error', 'Не удалось создать запись');
    }

    public function edit(int $catid) {
    	$cat = Category::with('news')
            ->select(['id', 'title', 'description', 'color'])
            ->where("id", "=", $catid)
            ->get();

        return view('category.edit', [
        	'category' => $cat[0]
		]);
    }
    
    public function update(Request $request, Category $category) {
        $cat = $category->fill(
			$request->only(['title', 'color', 'description'])
		)->save();

        if ($cat) {
        	return redirect()->route('category')
				->with('success', 'Запись успешно обновлена');
		}

        return back()->with('error', 'Не удалось обновить запись');
    }
}
