<?php

namespace Rweiser\FormHandler\Tests;

use PHPUnit\Framework\TestCase;
use Rweiser\FormHandler\Form;
use Rweiser\FormHandler\FormFileTemplate;
use Rweiser\FormHandler\FormValidator;

class FormValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function test()
    {
        $template = new FormFileTemplate(__DIR__ . '/test-data/form-template.yaml');

        $expectedRules = [
            'name' => [
                'required',
                'minLength' => 3,
            ],
            'email' => [
                'required',
                'email'
            ],
            'text' => [
                'required',
                'minLength' => 3,
                'maxLength' => 3000,
            ],
        ];

        $expectedMessages = [
            'name' => 'Please enter a valid name',
            'email' => 'Please enter a valid email address',
            'text' => 'Please enter a text between 3 and 3000 characters',
        ];

        $this->assertSame($expectedRules, $template->getRules());
        $this->assertSame($expectedMessages, $template->getMessages());
    }
}
