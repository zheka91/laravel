<?php declare(strict_types=1);

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model {
	protected $table = "news";

	protected $fillable = array(
		'category_id',
		'title',
		'status',
		'image',
		'slug',
		'description'
	);

	public function getNews($catid) {
		return \DB::table($this->table)
			->select(['id', 'title', 'description', 'created_at'])
			->where("category_id", "=", $catid)
			->get();
	}

	public function getNewsById(int $id) {
		return \DB::table($this->table)
			->find($id);
	}

	public function category(): BelongsTo {
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
