<?php

namespace Tests\Feature;

use App\Models\Turn;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class TurnTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testViewTurns()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/turns');
        $response->assertStatus(200);
    }

    public function testSeeAspecificTurn()
    {
        $user = User::factory()->create();
        $turn = Turn::factory()->create([
            'user_id'=>$user]);
        $response = $this->actingAs($user)
            ->get('turns/'.$turn->id);
        $response->assertStatus(200);
    }
}
