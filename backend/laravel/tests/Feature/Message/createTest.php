<?php

namespace Tests\Feature\Message;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class createTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function test_200()
    {
        $response = $this->withHeaders([

        ])->json('POST', '/api/messages', [
            'member' => 'verycow',
            'message' => 'update test'
        ]);

        // $response->dump()->dumpHeaders();

        $response->assertStatus(200)
            ->assertSee('success');
    }
}
