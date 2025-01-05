<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase; 
    // public function test_the_application_returns_a_successful_response(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    
    public function test_can_add_ue_with_valid_data()
    {
        // Arrange
        $ueData = [
            'code' => 'INFO123',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 1
        ];
        $response = $this->post('/ue/add', $ueData);

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('ue.action');
        
        $this->assertDatabaseHas('ues', $ueData);
    }

}
