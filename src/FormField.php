<?php

namespace Rweiser\FormHandler;

class FormField implements IFormField
{
    private string $label;
    private string $name;

    public function __construct(string $label, string $name)
    {
        $this->label = $label;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}
