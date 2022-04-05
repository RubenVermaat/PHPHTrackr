<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    protected static $migrationRun = false;

    public function setUp(): void
    {
        parent::setUp();

        if (!static::$migrationRun) {
            $this->artisan('migrate:fresh');
            $this->artisan('db:seed');
            static::$migrationRun = true;
        }
    }

    /** @test */
    public function selectNoRoleTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/register')
                ->type('@name', 'David')
                ->type('@email', 'David.vanderhout@gmail.com')
                ->type('@password', 'DavidTestPassword')
                ->type('@password_confirmation', 'DavidTestPassword')
                ->press('@register')
                ->assertSee('Whoops! Something went wrong.');
        });
    }

    /** @test */
    public function wrongSecondPassword()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('@name', 'David')
                ->type('@email', 'David.vanderhout@gmail.com')
                ->type('@password', 'DavidTestPassword')
                ->type('@password_confirmation', 'RubenTestPassword')
                ->press('@register')
                ->assertSee('Whoops! Something went wrong.');
        });
    }

    
    /** @test */
    public function alreadyExcists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('@name', 'Ruben')
                ->type('@email', 'Ruben.vanderhout@gmail.com')
                ->type('@password', 'RubenTestPassword')
                ->type('@password_confirmation', 'RubenTestPassword')
                ->press('@register')
                ->assertSee('Whoops! Something went wrong.');
        });
    }
    
    /** @test */
    public function goodLoginTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('@name', 'David')
                ->type('@email', 'David.vanderhout@gmail.com')
                ->type('@password', 'DavidTestPassword')
                ->type('@password_confirmation', 'DavidTestPassword')
                ->press('@register')
                ->assertPathIs('/dashboard');
        });
    }
}
