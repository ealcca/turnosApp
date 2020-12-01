<?php

namespace Tests\Feature;

use App\Models\Turn;
use App\Models\Client;
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

    public function testUserCanViewSpecificTurn()
    {
        $user = User::factory()->create();
        $turn = Turn::factory()->create([
            'user_id'=>$user
        ]);
        $response = $this->actingAs($user)
            ->get('turns/'.$turn->id);
        $response->assertStatus(200);
        $response->assertSee($turn->date);
        $response->assertSee($turn->time);
        $response->assertSee($turn->done);
        $response->assertSee($turn->client_id);   
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

    public function testUserManagerRoleCanStoreTurn()
    {   
        $client = Client::factory()->create();
        $user = User::factory()->create([
            'role' => 'manager'
        ]);
        $response = $this->actingAs($user)->post('turns',[
            'date' => '2020-10-10',
            'time' => '13:40',
            'done' => false,
            'client_id' => $client->id,
            'user_id' => $user->id
        ]);
        $turn = Turn::first();
        $this->assertEquals($turn->date,'2020-10-10');
        $this->assertEquals($turn->time,'13:40:00');
        $this->assertEquals($turn->done,false);
        $this->assertEquals($turn->client_id, $client->id);
        $this->assertEquals($turn->user_id, $user->id);
    }

    public function testUserCanViewEditTurn()
    {
        $user = User::factory()->create([
            'role'=>'manager'
        ]);
        $turn = Turn::factory()->create([
            'user_id'=>$user
        ]);
        $response = $this->actingAs($user)
            ->get('turns/'.$turn->id.'/edit/');
        $response->assertStatus(200);
        $response->assertSee($turn->date);
        $response->assertSee($turn->time);
        $response->assertSee($turn->done);
        $response->assertSee($turn->client_id);   
    }

    public function testUserManagerRoleCanEditTurn()
    {   
        $user = User::factory()->create([
            'role'=>'manager'
        ]);
        $client = Client::factory()->create();
        $turn = Turn::factory()->create([
            'user_id'=>$user,
            'client_id'=>$client
        ]);
        $response = $this->actingAs($user)->put('turns/'.$turn->id,[
            'date' => '2020-10-10',
            'time' => '13:40',
            'done' => false,
            'client_id' => $client->id,
            'user_id' => $user->id
        ]);
        $turn = Turn::first();
        $this->assertEquals($turn->date,'2020-10-10');
        $this->assertEquals($turn->time,'13:40:00');
        $this->assertEquals($turn->done,false);
        $this->assertEquals($turn->client_id, $client->id);
        $this->assertEquals($turn->user_id, $user->id);
    }

    public function testUserManagerRoleCanDestroyTurn()
    {   
        $user = User::factory()->create([
            'role'=>'manager'
        ]);
        $client = Client::factory()->create();
        $turn = Turn::factory()->create([
            'user_id'=>$user,
            'client_id'=>$client
        ]);
        $response = $this->actingAs($user)
            ->delete('turns/'.$turn->id);
        $turn = Turn::all();
        $this->assertEquals($turn->count(),0);        
    }




}
