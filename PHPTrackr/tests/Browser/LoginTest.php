<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function testLogin()
    {
        $this->browse(function ($first, $second, $third) {
            //normal login
            $first->visit('/login')
                ->type('@email', 'ruben.vanderhout@gmail.com')
                ->type('@password', 'RubenTestPassword')
                ->press('@login')
                ->assertPathIs('/dashboard');

            $second->visit('/login')
                ->type('@email', 'ruben.vanderhout@gmail.com')
                ->type('@password', 'WrongPassword')
                ->press('@login')
                ->assertSee('Whoops! Something went wrong.');
                
            //normal login
            $third->visit('/login')
                ->type('@email', 'ruben.vanderhout@gmail.com')
                ->type('@password', 'RubenTestPassword')
                ->press('@login')
                ->assertPathIs('/dashboard');
        });
    }
    
}
