<?php

namespace Tests\Feature\Message;

use App\Models\Message;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class detailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function test_200()
    {
        $message = Message::create([
            'member' => 'verycow',
            'message' => 'first test',
        ]);

        $response = $this->withHeaders([

        ])->json('GET', '/api/messages/' . $message->id, [

        ]);

        // $response->dump()->dumpHeaders();

        $response->assertStatus(200)
            ->assertJson([
                'member' => $message->member,
                'message' => $message->message,
            ]);
    }
}
