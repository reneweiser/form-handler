<?php

namespace Rweiser\FormHandler\Tests;

use PHPUnit\Framework\TestCase;
use Rweiser\FormHandler\Form;
use Rweiser\FormHandler\FormField;
use Rweiser\FormHandler\FormFileTemplate;
use Rweiser\FormHandler\IRenderable;

class FormTest extends TestCase
{
    private FormFileTemplate $template;

    protected function setUp(): void
    {
        $this->template = new FormFileTemplate(__DIR__.'/test-data/user-data.yml');
    }
}
