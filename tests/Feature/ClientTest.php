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
    public function testViewClients()
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

    public function testStoreClient()
    {   
        
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('clients',[
            'name' => 'Josefina',
            'lastname' => 'Sanchez',
            'age' => 25,
            'phone' => '248596352'
        ]);
        $client = Client::first();
        $this->assertEquals($client->name,'Josefina');
        $this->assertEquals($client->lastname,'Sanchez');
        $this->assertEquals($client->age,25);
        $this->assertEquals($client->phone, '248596352');
    }

    public function testViewEditClient()
    {
        $client = Client::factory()->create();
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('clients/'.$client->id.'/edit/');
        $response->assertStatus(200);
        $response->assertSee($client->name);
        $response->assertSee($client->lastname);
        $response->assertSee($client->age);
        $response->assertSee($client->phone);   
    }

    public function testEditClient()
    {   
        $user = User::factory()->create();
        $client = Client::factory()->create();
        $response = $this->actingAs($user)->put('clients/'.$client->id,[
            'name' => 'Josefina',
            'lastname' => 'Sanchez',
            'age' => 25,
            'phone' => '248596352'
        ]);
        $client = Client::first();
        $this->assertEquals($client->name,'Josefina');
        $this->assertEquals($client->lastname,'Sanchez');
        $this->assertEquals($client->age,25);
        $this->assertEquals($client->phone,'248596352');
    }

    
}
