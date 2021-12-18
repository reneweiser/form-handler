<?php

namespace Rweiser\FormHandler;

class DateTime implements IHasLabel, IHasValue, IRequirable, IRenderable
{
    private string $label;
    private bool $isRequired;
    private \DateTime $value;

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

    function value(): \DateTime
    {
        var_dump($this->value->format('c'));
        return $this->value;
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderDateTime($this);
    }

    public function isRequired(): bool
    {
        return $this->isRequired;
    }
}
