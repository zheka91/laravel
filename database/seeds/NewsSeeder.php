<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData() : array {
        $facer = Factory::create();
        $data = array();
        for ($i = 0; $i < 10; ++$i) {
            for ($j = 0; $j < 10; ++$j) {
                $title = $facer->sentence(mt_rand(3, 10));
                $slug = \Str::slug($title);
                $data[] = array(
                    "category_id" => $i + 1,
                    "title" => $title,
                    "description" => $facer->text(256),
                    "slug" => $slug,
                    "created_at" => now(),
                    "updated_at" => now(),
                );
            }
        }
        return $data;
    }
}
