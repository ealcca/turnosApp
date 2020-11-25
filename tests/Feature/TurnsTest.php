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
    public function testViewTurn()
    {      
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/turns');
        $response->assertStatus(200);
    }
}
