<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Turn;
use App\Models\User;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testClient()
    {
        $client = Client::factory()->create();
        $turn = Turn::factory()->create(['client_id'=>$client]);
        $this->assertEquals($client->id,$turn->client->id);
    }
}
