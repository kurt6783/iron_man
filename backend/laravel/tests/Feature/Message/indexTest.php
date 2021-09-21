<?php

namespace Tests\Feature\Message;

use App\Models\Message;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class indexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function test_200()
    {
        $messages = Message::factory(3)
            ->create();

        $response = $this->withHeaders([

        ])->json('GET', '/api/messages', [

        ]);

        // $response->dump()->dumpHeaders();

        $response->assertStatus(200)
            ->assertJson([
                [
                    'member' => $messages[0]->member,
                    'message' => $messages[0]->message,
                ],
                [
                    'member' => $messages[1]->member,
                    'message' => $messages[1]->message,
                ],
                [
                    'member' => $messages[2]->member,
                    'message' => $messages[2]->message,
                ]
            ]);
    }
}