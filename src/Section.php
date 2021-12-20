<?php

namespace Rweiser\FormHandler;

use Illuminate\Support\Collection;

class Section implements IRenderable
{
    private Collection $fields;
    private string $name;
    private string $label;

    public function __construct(array $data)
    {
        $this->fields = collect($data['fields'])
            ->map(fn ($field) => FieldFactory::create($field));
        $this->label = $data['label'];
        $this->name = $data['name'];
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderGroup($this);
    }

    public function addField(IRenderable $field): void
    {
        $this->fields->add($field);
    }

    public function fields(): Collection
    {
        return $this->fields;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function label(): string
    {
        return $this->label;
    }
}
