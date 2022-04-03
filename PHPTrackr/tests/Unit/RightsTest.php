<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;


class RightsTests extends TestCase
{

    protected static $migrationRun = false;

    public function setUp(): void{
        parent::setUp();
    
        if(!static::$migrationRun){
            $this->artisan('migrate:refresh');
            $this->artisan('db:seed');
            static::$migrationRun = true;
        }
    }
    
    /** @test */
    public function AdminIsAdmin() 
    {
        $user = User::create([
            'name' => 'test1',
            'email' => 'test1.vanderhout@gmail.com',
            'password' => Hash::make('RubenTestPassword'), // password
            'remember_token' => Str::random(10),
            'role' => "Admin"
        ]);

        $this->assertTrue($user->isAdmin($user->getId()));
    }
    /** @test */
    public function AdminIsReceiver()
    {
        $user = User::create([
            'name' => 'test2',
            'email' => 'test2.vanderhout@gmail.com',
            'password' => Hash::make('RubenTestPassword'), // password
            'remember_token' => Str::random(10),
            'role' => "Admin"
        ]);

        $this->assertTrue($user->isReceiver($user->getId()));
    }
    
   /** @test */
    public function AdminCanRead() 
    {
        $user = User::create([
            'name' => 'test3',
            'email' => 'test3.vanderhout@gmail.com',
            'password' => Hash::make('RubenTestPassword'), // password
            'remember_token' => Str::random(10),
            'role' => "Admin"
        ]);

        $this->assertTrue($user->canRead($user->getId()));
    }
   /** @test */
    public function AdminCanWrite() 
    {
        $user = User::create([
            'name' => 'test4',
            'email' => 'test4.vanderhout@gmail.com',
            'password' => Hash::make('RubenTestPassword'), // password
            'remember_token' => Str::random(10),
            'role' => "Admin"
        ]);

        $this->assertTrue($user->canWrite($user->getId()));
    }

 /** @test */
  public function AdminstratiefCanRead() 
  {
      $user = User::create([
          'name' => 'test5',
          'email' => 'test5.vanderhout@gmail.com',
          'password' => Hash::make('RubenTestPassword'), // password
          'remember_token' => Str::random(10),
          'role' => "Adminstratief"
      ]);

      $this->assertTrue($user->canRead($user->getId()));
  }
 /** @test */
  public function AdminstratiefCanWrite() 
  {
      $user = User::create([
          'name' => 'test6',
          'email' => 'test6.vanderhout@gmail.com',
          'password' => Hash::make('RubenTestPassword'), // password
          'remember_token' => Str::random(10),
          'role' => "Adminstratief"
      ]);

      $this->assertTrue($user->canWrite($user->getId()));
  }

 
  
 /** @test */
  public function InpakkerCanRead() 
  {
      $user = User::create([
          'name' => 'test7',
          'email' => 'test7.vanderhout@gmail.com',
          'password' => Hash::make('RubenTestPassword'), // password
          'remember_token' => Str::random(10),
          'role' => "Inpakker"
      ]);

      $this->assertTrue($user->canRead($user->getId()));
  }
 /** @test */
  public function InpakkerCanWrite() 
  {
      $user = User::create([
          'name' => 'test8',
          'email' => 'test8.vanderhout@gmail.com',
          'password' => Hash::make('RubenTestPassword'), // password
          'remember_token' => Str::random(10),
          'role' => "Inpakker"
      ]);

      $this->assertFalse($user->canWrite($user->getId()));
  }

   /** @test */
   public function OntvangerCanRead() 
   {
       $user = User::create([
           'name' => 'test9',
           'email' => 'test9.vanderhout@gmail.com',
           'password' => Hash::make('RubenTestPassword'), // password
           'remember_token' => Str::random(10),
           'role' => "Ontvanger"
       ]);
 
       $this->assertFalse($user->canRead($user->getId()));
   }
  /** @test */
   public function OntvangerCanWrite() 
   {
       $user = User::create([
           'name' => 'test10',
           'email' => 'test10.vanderhout@gmail.com',
           'password' => Hash::make('RubenTestPassword'), // password
           'remember_token' => Str::random(10),
           'role' => "Ontvanger"
       ]);
 
       $this->assertFalse($user->canWrite($user->getId()));
   }

   /** @test */
   public function OntvangerIsReceiver()
   {
       $user = User::create([
           'name' => 'test11',
           'email' => 'test11.vanderhout@gmail.com',
           'password' => Hash::make('RubenTestPassword'), // password
           'remember_token' => Str::random(10),
           'role' => "Ontvanger"
       ]);

       $this->assertTrue($user->isReceiver($user->getId()));
   }
}