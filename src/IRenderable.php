<?php

namespace Rweiser\FormHandler;

interface IRenderable
{
    public function label(): string;
    public function name(): string;
    public function render(IFormRenderer $renderer): string;
}
