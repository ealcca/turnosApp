<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Turn;
use App\Models\User;
//use Tests\TestCase;
use PHPUnit\Framework\TestCase;

class TurnTest extends TestCase
{
    
    public function testClient()
    {
        $client = Client::factory()->create();
        $turn = Turn::factory()->create(['client_id'=>$client]);
        $this->assertEquals($client->id,$turn->client->id);
    }

    public function testUser()
    {
        $user = User::factory()->create();
        $turn = Turn::factory()->create(['user_id'=>$user]);
        $this->assertEquals($user->id,$turn->user->id);
    }
}
