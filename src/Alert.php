<?php

namespace Rweiser\FormHandler;

class Alert implements IRenderable
{
    private string $text;

    public function __construct(array $data)
    {
        $this->text = $data['text'];
    }

    public function label(): string
    {
        return '';
    }

    public function name(): string
    {
        return '';
    }

    public function value(): string
    {
        return $this->text;
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderAlert($this);
    }
}
