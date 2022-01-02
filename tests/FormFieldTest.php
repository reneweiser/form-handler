<?php

namespace Rweiser\FormHandler\Tests;

use PHPUnit\Framework\TestCase;
use Rweiser\FormHandler\Alert;
use Rweiser\FormHandler\Check;
use Rweiser\FormHandler\DateTime;
use Rweiser\FormHandler\FieldFactory;
use Rweiser\FormHandler\FormField;
use Rweiser\FormHandler\FormFileTemplate;
use Rweiser\FormHandler\Paragraph;
use Rweiser\FormHandler\Radio;
use Rweiser\FormHandler\Section;
use Rweiser\FormHandler\Selection;
use Rweiser\FormHandler\SingleLine;
use Rweiser\FormHandler\TextBlock;

class FormFieldTest extends TestCase
{
    private FormField $field;

    protected function setUp(): void
    {
        $this->field = new FormField('Test field', 'test_field');
    }

    /**
     * @test
     */
    public function it_creates_a_single_line_text_field()
    {
        $singleLine = new SingleLine($this->field);
        $expectedRules = [
            'required',
            'min' => 3,
            'max' => 20,
        ];

        $singleLine->setRules($expectedRules);
        $singleLine->setMessage('Test error message');

        $this->assertSame('Test field', $singleLine->getLabel());
        $this->assertSame('test_field', $singleLine->getName());
        $this->assertSame($expectedRules, $singleLine->getRules());
        $this->assertSame('Test error message', $singleLine->getMessage());
    }

    /**
     * @test
     */
    public function it_creates_a_paragraph_text_field()
    {
        $paragraph = new Paragraph($this->field);
        $expectedRules = [
            'required',
            'min' => 3,
            'max' => 20,
        ];
        $paragraph->setRules($expectedRules);

        $this->assertSame('Test field', $paragraph->getLabel());
        $this->assertSame('test_field', $paragraph->getName());
        $this->assertSame($expectedRules, $paragraph->getRules());
    }

    /**
     * @test
     */
    public function it_creates_a_selection_field()
    {
        $selection = new Selection($this->field);
        $expectedRules = [
            'required',
            'min' => 3,
            'max' => 20,
        ];
        $expectedOptions = [
            'option 1',
            'option 2',
            'option 3',
        ];
        $selection->setRules($expectedRules);
        $selection->setOptions($expectedOptions);

        $this->assertSame('Test field', $selection->getLabel());
        $this->assertSame('test_field', $selection->getName());
        $this->assertSame($expectedRules, $selection->getRules());
        $this->assertEquals($expectedOptions, $selection->getOptions());
    }

    /**
     * @test
     */
    public function it_creates_a_radio_field()
    {
        $radio = new Radio($this->field);
        $expectedRules = ['required'];
        $radio->setRules($expectedRules);
        $radio->setValue('test_value');

        $this->assertSame('Test field', $radio->getLabel());
        $this->assertSame('test_field', $radio->getName());
        $this->assertEquals($expectedRules, $radio->getRules());
        $this->assertSame('test_value', $radio->getValue());
    }

    /**
     * @test
     */
    public function it_creates_a_check_field()
    {
        $check = new Check($this->field);
        $expectedRules = ['required'];
        $check->setRules($expectedRules);

        $this->assertSame('Test field', $check->getLabel());
        $this->assertSame('test_field', $check->getName());
        $this->assertEquals($expectedRules, $check->getRules());
    }

    /**
     * @test
     */
    public function it_creates_a_text_block_field()
    {
        $textBlock = new TextBlock($this->field);
        $textBlock->setContent('test content');

        $this->assertSame('Test field', $textBlock->getLabel());
        $this->assertSame('test_field', $textBlock->getName());
        $this->assertSame('test content', $textBlock->getContent());
    }

    /**
     * @test
     */
    public function it_creates_an_alert_field()
    {
        $alert = new Alert($this->field);
        $alert->setContent('test content');

        $this->assertSame('Test field', $alert->getLabel());
        $this->assertSame('test_field', $alert->getName());
        $this->assertSame('test content', $alert->getContent());
    }

    /**
     * @test
     */
    public function it_creates_a_section_field()
    {
        $section = new Section($this->field);

        $this->assertSame('Test field', $section->getLabel());
        $this->assertSame('test_field', $section->getName());
        $this->assertCount(0, $section->getFields());

        $section->addField(new SingleLine(new FormField('Some label', 'some_name')));
        $this->assertCount(1, $section->getFields());
    }

    /**
     * @test
     */
    public function it_creates_fields_based_on_data()
    {
        $template = new FormFileTemplate(__DIR__.'/test-data/user-data.yml');

        $this->assertCount(1, $template->getFields());

        $section = $template->getFields()[0];

        $this->assertCount(8, $section->getFields());
    }
}
