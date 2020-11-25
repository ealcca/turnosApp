<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Turn;
use App\Models\User;
use Tests\TestCase;

class TurnTest extends TestCase
{
    
    public function testUser()
    {
        $user = User::factory()->create();
        $turn = Turn::factory()->create(['user_id'=>$user]);
        $this->assertEquals($user->id,$turn->user->id);
    }

    public function sa()
    {
        $user = User::factory()->create();
        $turn = Turn::factory()->create(['user_id'=>$user]);
        $this->assertEquals($user->id,$turn->user->id);
    }


}
