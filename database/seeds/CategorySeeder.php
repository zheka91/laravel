<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    public function getData() : array {
        $facer = Factory::create();
        $data = array();
        for ($i = 0; $i < 10; ++$i) {
            $data[] = array(
                "title" => $facer->sentence(mt_rand(3, 10)),
                "description" => $facer->text(256),
                "color" => $facer->hexColor,
                "created_at" => now(),
                "updated_at" => now(),
            );
        }
        return $data;
    }
}
