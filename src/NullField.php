<?php

namespace Rweiser\FormHandler;

class NullField implements IFormField, IRenderable
{

    public function render(IFormRenderer $renderer): string
    {
        return '';
    }

    function getLabel(): string
    {
        return '';
    }

    function getName(): string
    {
        return '';
    }
}
