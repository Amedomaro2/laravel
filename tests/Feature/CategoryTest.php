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
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCategory()
    {
        $category = [
            'title' => 'Test name',
            'description' => 'Test description'
        ];
        $this->post('/category', $category);
        $this->assertDatabaseHas('category', $category);

        $this->post('/category', $category);

        $this->assertDatabaseHas('category', $category);

        $this->get('/category')
            ->assertSee($category['title']);
    }
}
