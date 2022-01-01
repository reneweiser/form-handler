<?php

namespace Rweiser\FormHandler;

class Section implements IFormField, IRenderable, IHasRules
{
    private IFormField $field;
    private array $fields;

    public function __construct(IFormField $field)
    {
        $this->field = $field;
        $this->fields = [];
    }

    function getLabel(): string
    {
        return $this->field->getLabel();
    }

    function getName(): string
    {
        return $this->field->getName();
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderGroup($this);
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function addField(IFormField $field): void
    {
        array_push($this->fields, $field);
    }

    function getRules(): array
    {
        return collect($this->fields)->reduce(function(array $acc, IHasRules $cur) {
            $acc[$cur->getName()] = $cur->getRules();
            return $acc;
        }, []);
    }

    function getMessages(): array
    {
        return collect($this->fields)->reduce(function(array $acc, IHasRules $cur) {
            $messages = $cur->getMessages();
            if (count($messages) === 0)
                return $acc;

            $acc[$cur->getName()] = $messages;
            return $acc;
        }, []);
    }
}
