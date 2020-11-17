<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegisterClient()
    {
        $user = User::factory()->create([
            'email'=>'test@test.com',
            'password'=>bcrypt('12345678')
        ]);
        
        $client = Client::factory()->make([
           
        ]);

        $this->browse(function (Browser $browser) use ($user, $client) {
            $browser->visit('/login')
                    ->type('email',$user->email)
                    ->type('password','12345678')
                    ->press('LOGIN')
                    ->visit('/clients/create')
                    ->type('name',$client->name)
                    ->type('lastname',$client->lastname)
                    ->type('age',$client->age)
                    ->type('phone',$client->phone)
                    ->press('Agregar_cliente')
                    ->assertSee('Clientes');
        });
    }
}
