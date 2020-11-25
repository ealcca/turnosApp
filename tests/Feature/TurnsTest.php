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
    public function testViewTurnsAsUser()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/turns');
        $response->assertStatus(200);
    }

    public function testSeeAspecificTurnAsUser()
    {
        $user = User::factory()->create();
        $turn = Turn::factory()->create([
            'user_id'=>$user
        ]);
        $response = $this->actingAs($user)
            ->get('turns/'.$turn->id);
        $response->assertStatus(200);
    }

    public function testUserRoleCantCreateTurn()
    {
        $user = User::factory()->create([
            'role'=>'user'
        ]);
        $response = $this->actingAs($user)
            ->get(route('turns.create'));
        $response->assertForbidden();
    }

    public function testManagerRoleCanCreateTurn()
    {
        $user = User::factory()->create([
            'role'=>'manager'
        ]);
        $response = $this->actingAs($user)
            ->get(route('turns.create'));
            $response->assertStatus(200);
    }
}
