<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Turn;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testViewClientsAsUser()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/clients');
        $response->assertStatus(200);
    }

    public function testCreateClient()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('clients.create'));
        $response->assertStatus(200);
    }

    
}
