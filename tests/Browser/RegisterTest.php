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

    public function testRegister()
    {
        $user = User::factory()->make([
            'email'=>'test@laravel.com',
            'password'=>bcrypt('123456789'),
            'role'=>'admin'
        ]);
      
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/register')
                    ->type('name',$user->name)
                    ->type('email',$user->email)
                    ->select('role',$user->role)
                    ->type('password','12345678')
                    ->type('password_confirmation','12345678')
                    ->press('REGISTER')
                    ->assertSee('Dashboard');
        });
    }

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
