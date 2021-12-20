<?php

namespace Rweiser\FormHandler;

class Paragraph implements IRenderable, IRequirable, IHasValue
{
    private string $label;
    private string $name;
    private string $value;
    private bool $isRequired;

    public function __construct(array $data)
    {
        $this->label = $data['label'];
        $this->value = $data['value'] ?? '';
        $this->name = $data['name'];
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

    public function name(): string
    {
        return $this->name;
    }
}
