<?php

namespace Rweiser\FormHandler;

use Illuminate\Support\Collection;

class Form
{
    private Collection $fields;

    public function __construct()
    {
        $this->fields = collect([]);
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->render($this);
    }

    public function addField(IRenderable $field): void
    {
        $this->fields->add($field);
    }

    public function fields(): Collection
    {
        return $this->fields;
    }
}
