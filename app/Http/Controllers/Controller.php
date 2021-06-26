<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $category = [
        0 => "Category0",
        1 => "Category1",
        2 => "Category2",
    ];

    protected $news = [
        0 => [
            "name" => "news0",
            "description" => "description0",
            "category" => 0,
        ],
        1 => [
            "name" => "news1",
            "description" => "description1",
            "category" => 0,
        ],
        2 => [
            "name" => "news2",
            "description" => "description2",
            "category" => 1,
        ],
        3 => [
            "name" => "news3",
            "description" => "description3",
            "category" => 1,
        ],
        4 => [
            "name" => "news4",
            "description" => "description4",
            "category" => 1,
        ],
        
        5 => [
            "name" => "news5",
            "description" => "description5",
            "category" => 2,
        ],
        6 => [
            "name" => "news6",
            "description" => "description6",
            "category" => 2,
        ],
        7 => [
            "name" => "news7",
            "description" => "description7",
            "category" => 2,
        ],
        8 => [
            "name" => "news8",
            "description" => "description8",
            "category" => 2,
        ],
    ];

    public function getCategory() : array {
        return $this->category;
    }

    public function getNews($catid) : array {
        $arr = [];
        foreach ($this->news as $key => $value) {
            if ($catid == $value["category"]) {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }
}
