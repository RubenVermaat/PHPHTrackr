<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Facebook\WebDriver\WebDriverKeys;

class UserOverviewTest extends DuskTestCase
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
    public function Input1SearchResultTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/customerview')
                ->type('search', '1');
            $browser->driver->getKeyboard()->sendKeys(WebDriverKeys::ENTER);
            $browser->assertSee('No products to display.');
        });
    }

    /** @test */
    public function NamesContainingLetterJTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/customerview')
                ->type('search', 'J');
            $browser->driver->getKeyboard()->sendKeys(WebDriverKeys::ENTER);
            $browser->assertSee('James')->assertDontSee('Pieter');
        });
    }
    
    /** @test */
    public function SortStatus()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/customerview')
            ->click('@name')->assertSeeIn('tr.bg-white:nth-child(2) > td:nth-child(1)', 'Natalja')
            ->click('@status')->assertSeeIn('tr.bg-white:nth-child(2) > td:nth-child(1)', 'Pieter');
        });
    }

}
