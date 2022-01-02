<?php

namespace Rweiser\FormHandler\Tests;

use PHPUnit\Framework\TestCase;
use Rweiser\FormHandler\Form;
use Rweiser\FormHandler\FormFileTemplate;
use Rweiser\FormHandler\MockFalseValidator;
use Rweiser\FormHandler\MockFieldTranslator;
use Rweiser\FormHandler\MockFormRenderer;
use Rweiser\FormHandler\NullTranslator;
use Rweiser\FormHandler\MockTrueValidator;

class FormTemplateTest extends TestCase
{
    private FormFileTemplate $template;

    protected function setUp(): void
    {
        $this->template = new FormFileTemplate(__DIR__.'/test-data/user-data.yml', new NullTranslator());
    }

    /**
     * @test
     */
    public function it_should_parse_a_yaml_file()
    {
        $this->assertSame('user_data', $this->template->getTemplate()[0]->getName());
    }

    /**
     * @test
     */
    public function it_should_return_all_rules_by_name()
    {
        $rules = $this->template->getRules();

        $this->assertCount(8, $rules);
        $this->assertContains('required', $rules['name']);
        $this->assertArrayHasKey('min', $rules['name']);
        $this->assertArrayHasKey('max', $rules['name']);
        $this->assertContains('required', $rules['agreed']);
        $this->assertArrayNotHasKey('min', $rules['agreed']);
        $this->assertArrayNotHasKey('max', $rules['agreed']);
        $this->assertNotContains('required', $rules['name_2']);
        $this->assertNotContains('required', $rules['type']);
    }

    /**
     * @test
     */
    public function it_should_return_all_messages_by_name()
    {
        $messages = $this->template->getMessages();

        $this->assertCount(6, $messages);
        $this->assertContains('Error message for name', $messages['name']);
        $this->assertContains('Error message for type', $messages['type']);
        $this->assertContains('Error message for country', $messages['country']);
        $this->assertArrayHasKey('name', $messages);
        $this->assertArrayNotHasKey('info', $messages);
    }

    /**
     * @test
     */
    public function it_should_add_itself_to_a_form()
    {
        $form = new Form('Test form');
        $form->addTemplate($this->template);
        $renderer = new MockFormRenderer();

        $expected = '-Group>user_data;SingleLine:name;SingleLine:name_2;Paragraph:text;Radio:type;Radio:type;Check:agreed;Selection:country;TextBlock:info;Alert:alert-Group>user_data_2;Alert:alert';
        $this->assertSame($expected, $renderer->render($form));
    }

    /**
     * @test
     */
    public function it_should_accept_a_validator()
    {
        $form = new Form('Test form');
        $form->addTemplate($this->template);
        $trueValidator = new MockTrueValidator();
        $falseValidator = new MockFalseValidator();

        $this->assertSame([], $trueValidator->validate($form));
        $this->assertSame(['some message'], $falseValidator->validate($form));
    }

    /**
     * @test
     */
    public function it_should_translate_labels()
    {
        $template = new FormFileTemplate(__DIR__.'/test-data/user-data.yml', new MockFieldTranslator());

        $fields = $template->getFields();
        $this->assertSame('Translated', $fields[0]->getLabel());
        $this->assertSame('Translated', $fields[1]->getLabel());
    }
}
