<?php

namespace Rweiser\FormHandler;

class Radio implements IRenderable, IHasValue, IHasLabel, IRequirable
{
    private string $label;
    private bool $isRequired;
    private bool $value;

    /**
     * @param array $data
     */
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

    function value(): bool
    {
        return $this->value;
    }

    public function isRequired(): bool
    {
        return $this->isRequired;
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderRadio($this);
    }
}
