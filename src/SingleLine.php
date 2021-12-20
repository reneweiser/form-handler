<?php

namespace Rweiser\FormHandler;

class SingleLine implements IRenderable, IRequirable, IHasValue
{
    private string $label;
    private string $name;
    private bool $isRequired;
    private string $value;

    public function __construct(array $data)
    {
        $this->label = $data['label'];
        $this->name = $data['name'];
        $this->value = $data['value'] ?? '';
        $this->isRequired = $data['is_required'] ?? false;
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
        return $renderer->renderSingleLine($this);
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
