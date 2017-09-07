<?php
namespace Tests\Feature;

use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_create_an_article()
    {
        $title = $this->faker->word;

        $data = [
            'title' => $title,
            'slug' => str_slug($title),
            'excerpt' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'author_id' => 1,
            'status_id' => 1,
            'date_start' => null,
            'date_end' => null,
        ];

        // $res = $this->post("api/v1/articles", $data);
        // dd($res->baseResponse->content());

        $this->post("api/v1/articles", $data)
                ->assertStatus(201)
                ->assertJsonStructure(array_keys($data), $data);
    }
}
