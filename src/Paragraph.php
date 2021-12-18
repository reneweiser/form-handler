<?php

namespace Rweiser\FormHandler;

class Paragraph implements IRenderable, IHasLabel, IRequirable, IHasValue
{
    private string $label;
    private string $value;
    private bool $isRequired;

    public function __construct(array $data)
    {
        $this->label = $data['label'];
        $this->value = $data['value'];
        $this->isRequired = $data['is_required'];
    }

    public function label(): string
    {
        return $this->label;
    }

    public function isRequired(): bool
    {
        return $this->isRequired;
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderParagraph($this);
    }

    function value(): string
    {
        return $this->value;
    }
}
