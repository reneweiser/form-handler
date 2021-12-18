<?php

namespace Rweiser\FormHandler\Tests;

use PHPUnit\Framework\TestCase;
use Rweiser\FormHandler\DateTime;
use Rweiser\FormHandler\Paragraph;
use Rweiser\FormHandler\Radio;
use Rweiser\FormHandler\Selection;
use Rweiser\FormHandler\SingleLine;

class FormFieldTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_single_line_text_field()
    {
        $data = [
            'label' => 'Test field',
            'is_required' => true,
            'value' => 'Field value'
        ];

        $singleLineText = new SingleLine($data);

        $this->assertSame('Test field', $singleLineText->label());
        $this->assertSame('Field value', $singleLineText->value());
        $this->assertTrue($singleLineText->isRequired());
    }

    /**
     * @test
     */
    public function it_creates_a_paragraph_text_field()
    {
        $data = [
            'label' => 'Test field',
            'is_required' => false,
            'value' => 'Field value'
        ];

        $paragraphText = new Paragraph($data);

        $this->assertSame('Test field', $paragraphText->label());
        $this->assertSame('Field value', $paragraphText->value());
        $this->assertFalse($paragraphText->isRequired());
    }

    /**
     * @test
     */
    public function it_creates_a_selection_field()
    {
        $data = [
            'label' => 'Test field',
            'is_required' => false,
            'value' => [
                'option 1',
                'option 2',
                'option 3',
            ]
        ];

        $selectionField = new Selection($data);

        $this->assertSame('Test field', $selectionField->label());
        $this->assertSame($data['value'], $selectionField->value());
        $this->assertFalse($selectionField->isRequired());
    }

    /**
     * @test
     */
    public function it_creates_a_radio_field()
    {
        $data = [
            'label' => 'Test field',
            'is_required' => false,
            'value' => true
        ];

        $selectionField = new Radio($data);

        $this->assertSame('Test field', $selectionField->label());
        $this->assertTrue($selectionField->value());
        $this->assertFalse($selectionField->isRequired());
    }

    /**
     * @test
     */
    public function it_creates_a_date_time_field()
    {
        $data = [
            'label' => 'Test field',
            'is_required' => false,
            'value' => new \DateTime('NOW')
        ];

        $selectionField = new DateTime($data);

        $this->assertSame('Test field', $selectionField->label());
        $this->assertSame($data['value'], $selectionField->value());
        $this->assertFalse($selectionField->isRequired());
    }
}
