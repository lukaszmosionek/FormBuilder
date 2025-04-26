<?php

namespace Tests\Feature;

use Tests\TestCase;

class FormControllerTest extends TestCase
{
    /** @test */
    public function it_shows_the_form_page()
    {
        $response = $this->get('/formularz');

        $response->assertStatus(200);
        $response->assertSee('Formularz kontaktowy');
        $response->assertSee('<form', false); // false = nie escape'ujemy HTML
    }

    /** @test */
    public function it_submits_form_with_valid_data()
    {
        $response = $this->post('/formularz', [
            'name' => 'Jan Kowalski',
            'email' => 'jan@example.com',
            'description' => 'Opis testowy'
        ]);

        $response->assertSessionHas('success', 'Formularz został wysłany poprawnie!');
    }

    /** @test */
    public function it_shows_validation_errors_for_invalid_data()
    {
        $response = $this->post('/formularz', [
            'name' => 'J', // za krótkie
            'email' => 'nieprawidlowy-email',
            'description' => str_repeat('x', 501), // za długi opis
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'description']);
    }
}
