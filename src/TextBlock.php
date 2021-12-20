<?php

namespace Rweiser\FormHandler;

class TextBlock implements IRenderable
{
    private string $label;
    private string $text;

    public function __construct(array $data)
    {
        $this->label = $data['label'];
        $this->text = $data['text'];
    }

    public function label(): string
    {
        return $this->label;
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
        return $renderer->renderTextBlock($this);
    }
}
