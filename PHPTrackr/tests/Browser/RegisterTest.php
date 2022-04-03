<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            // select nothing
            $browser->visit('/register')
                ->type('@name', 'David')
                ->type('@email', 'David.vanderhout@gmail.com')
                ->type('@password', 'DavidTestPassword')
                ->type('@password_confirmation', 'DavidTestPassword')
                ->press('@register')
                ->assertSee('Whoops! Something went wrong.');
            // wrong second password
            $browser->visit('/register')
                ->type('@name', 'David')
                ->type('@email', 'David.vanderhout@gmail.com')
                ->select('role')
                ->type('@password', 'DavidTestPassword')
                ->type('@password_confirmation', 'RubenTestPassword')
                ->press('@register')
                ->assertSee('Whoops! Something went wrong.');
            // already exists
            $browser->visit('/register')
                ->type('@name', 'Ruben')
                ->type('@email', 'Ruben.vanderhout@gmail.com')
                ->type('@password', 'RubenTestPassword')
                ->type('@password_confirmation', 'RubenTestPassword')
                ->press('@register')
                ->assertSee('Whoops! Something went wrong.');

            //good login
            $browser->visit('/register')
                ->type('@name', 'David')
                ->type('@email', 'David.vanderhout@gmail.com')
                ->select('role')
                ->type('@password', 'DavidTestPassword')
                ->type('@password_confirmation', 'DavidTestPassword')
                ->press('@register')
                ->assertPathIs('/dashboard');
        });
    }
}
