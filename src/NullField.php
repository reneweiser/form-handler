<?php

namespace Rweiser\FormHandler;

class NullField implements IRenderable
{

    public function label(): string
    {
        return '';
    }

    public function name(): string
    {
        return '';
    }

    public function render(IFormRenderer $renderer): string
    {
        return '';
    }
}
