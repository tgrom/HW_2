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
    public function test_list_status_succes(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_create_status_success(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $data = [
            'title' => 'Some title',
            'autor' => 'Admin',
            'description' => 'Some text'
        ];
        $response = $this->post(route('admin.news.store'), $data);

        $response->assertJson($data)
            ->assertCreated();
    }


}
