<?php

namespace Rweiser\FormHandler\Tests;

use PHPUnit\Framework\TestCase;
use Rweiser\FormHandler\Form;
use Rweiser\FormHandler\IRenderable;
use Rweiser\FormHandler\IFormRenderer;

class FormTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_rendered()
    {
        $form = new Form('test form');
        $renderer = $this->createStub(IFormRenderer::class);
        $renderer->method('render')->willReturn('<form></form>');

        $this->assertEquals('<form></form>', $form->render($renderer));
    }

    /**
     * @test
     */
    public function it_can_add_fields()
    {
        $form = new Form('test form');
        $field = $this->createStub(IRenderable::class);

        $this->assertCount(0, $form->fields());
        $form->addField($field);
        $this->assertCount(1, $form->fields());
    }
}
