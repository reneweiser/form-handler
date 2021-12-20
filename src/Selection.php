<?php

namespace Rweiser\FormHandler;

class Selection implements IRenderable, IHasValue, IRequirable
{
    private string $label;
    private string $name;
    private bool $isRequired;
    private array $value;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->label = $data['label'];
        $this->name = $data['name'];
        $this->value = $data['value'];
        $this->isRequired = $data['is_required'];
    }

    public function label(): string
    {
        return $this->label;
    }

    function value(): array
    {
        return $this->value;
    }

    public function isRequired(): bool
    {
        return $this->isRequired;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderSelection($this);
    }
}
