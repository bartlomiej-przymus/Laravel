<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{
    use RefreshDatabase; // this is responsible for getting rid of any changes we made to database during testing
    
    
    
    //snippet below tells phpunit that this is a test
    /** @test */

    public function a_user_can_create_a_team()
    {
        $this->withoutExceptionHandling();
        //write it out first the way you would speak
        
        $this->actingAs(factory('App\User')->create());
        //Given I am user that is logged in
        
        $atributes = ['name' => 'Acme'];

        $this->post('/teams', $atributes);
            //'owner_id' => '', we don't need this as owner will be currently logged user anyway

        //When user hits route endpoint /teams to create new team while passing the necessary data

        $this->assertDatabaseHas('teams', $atributes);
        //Then there should be a new team in the database
        
    }

    /** @test */
    public function guests_may_not_create_teams()
    {
        //$this->withoutExceptionHandling();

        $this->post('/teams')->assertRedirect('/login');
    }
   
}
