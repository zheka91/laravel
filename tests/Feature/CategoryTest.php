<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
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

    public function test_category_list_status()
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }

    public function test_category_status()
    {
        $id = mt_rand(1, 3);
        $response = $this->get('/category/' . $id);

        $response->assertStatus(200);
    }

    public function test_category_not_found()
    {
        $response = $this->get('/categorys');

        $response->assertNotFound();
    }

    public function test_category_content_txt()
    {
        $response = $this->get('/category');

        $response->assertSeeText('Category');
    }

    public function test_category_header()
    {
        $response = $this->get('/category');

        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
    }
}
