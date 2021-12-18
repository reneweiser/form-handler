<?php

namespace Rweiser\FormHandler;

interface IRenderable
{
    public function render(IFormRenderer $renderer): string;
}
