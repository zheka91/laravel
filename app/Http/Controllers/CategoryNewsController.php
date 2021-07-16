<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\CategoryUpdate;
use App\Http\Requests\CategoryStore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
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

    public function store(CategoryStore $request) {
        $cat = Category::create(
			$request->validated()
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
    
    public function update(CategoryUpdate $request, Category $category) {
        $cat = $category->fill(
			$request->validated()
		)->save();

        if ($cat) {
        	return redirect()->route('category')
				->with('success', 'Запись успешно обновлена');
		}

        return back()->with('error', 'Не удалось обновить запись');
    }
}
