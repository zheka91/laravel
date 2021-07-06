<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_news_list_status()
    {
        $id = mt_rand(1, 3);
        $response = $this->get('/category/' . $id);

        $response->assertStatus(200);
    }

    public function test_news_status()
    {
        $id = mt_rand(1, 8);
        $response = $this->get('/news/' . $id);

        $response->assertStatus(200);
    }
}
