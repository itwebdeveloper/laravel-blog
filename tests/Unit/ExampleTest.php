<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Given I have two records in the database that are posts,
        $first = factory('App\Post')->create();
        // and each one is posted a month apart.
        $second = factory('App\Post')->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        // When I fetch the archives.
        $posts = Post::archives();

        // Then the response should be in the proper format.
        $this->assertEquals([
          [
            "year" => $first->created_at->format('Y'),
            "month" => $first->created_at->format('F'),
            "published" => 5
          ],
          [
            "year" => $second->created_at->format('Y'),
            "month" => $second->created_at->format('F'),
            "published" => 5
          ]
        ], $posts);
    }
}
