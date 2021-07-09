<?php declare(strict_types=1);

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model {
   protected $table = "news";

   public function getNews($catid) {
        return \DB::table($this->table)
		  ->select(['id', 'title', 'description', 'created_at'])
        ->where("category_id", "=", $catid)
		  ->get();
   }

   public function getNewsById(int $id)
   {
        return \DB::table($this->table)
			->find($id);
   }
}