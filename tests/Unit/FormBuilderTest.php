<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\FormBuilder;

class FormBuilderTest extends TestCase
{
    /** @test */
    public function it_generates_a_basic_form_structure()
    {
        $builder = new FormBuilder('/submit');
        $formHtml = $builder->render();

        $this->assertStringContainsString('<form', $formHtml);
        $this->assertStringContainsString("action='/submit'", $formHtml);
        $this->assertStringContainsString('_token', $formHtml); // sprawdzamy czy jest CSRF
    }

    /** @test */
    public function it_adds_text_input_field()
    {
        $builder = new FormBuilder('/submit');
        $builder->addField('text', 'username', 'Nazwa użytkownika', true, 'form-control');
        $formHtml = $builder->render();

        $this->assertStringContainsString('type=\'text\'', $formHtml);
        $this->assertStringContainsString('name=\'username\'', $formHtml);
        $this->assertStringContainsString('required', $formHtml);
        $this->assertStringContainsString('class=\'form-control\'', $formHtml);
    }

    /** @test */
    public function it_adds_textarea_field()
    {
        $builder = new FormBuilder('/submit');
        $builder->addField('textarea', 'opis', 'Opis', false, 'textarea-class');
        $formHtml = $builder->render();

        $this->assertStringContainsString('<textarea', $formHtml);
        $this->assertStringContainsString('name=\'opis\'', $formHtml);
        $this->assertStringContainsString('class=\'textarea-class\'', $formHtml);
    }
}
