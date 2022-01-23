<?php

use PHPUnit\Framework\TestCase;
use Rweiser\FormHandler\FormFileTemplate;
use Rweiser\FormHandler\NullTranslator;

class FormTest extends TestCase
{
    private FormFileTemplate $template;

    protected function setUp(): void
    {
        $translator = new NullTranslator();
        $this->template = new FormFileTemplate(__DIR__.'/test-data/user-data.yml', $translator);
    }

    /*
     * @test
     */
    public function test()
    {
        var_dump($this->template->getMessages());
//        $this->assertEquals('something', $this->template->getMessages());
    }
}
