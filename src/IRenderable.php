<?php

namespace Rweiser\FormHandler;

interface IRenderable
{
    public function getLabel(): string;
    public function getName(): string;
    public function render(IFormRenderer $renderer): string;
}
