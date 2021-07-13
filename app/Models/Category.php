<?php declare(strict_types=1);

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
	protected $table = "categories";

	protected $fillable = array(
		'title',
		'color',
		'description'
	);

	public function getCategories() {
		return \DB::table($this->table)
			->select(['id', 'title', 'description', 'created_at'])
			->get();
	}

	public function getCategoryById(int $id) {
		return \DB::table($this->table)
			->find($id);
	}

	public function news(): HasMany {
		return $this->hasMany(News::class, 'category_id', 'id');
	}
}
