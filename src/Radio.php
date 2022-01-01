<?php

namespace Rweiser\FormHandler;

class Radio implements IFormField, IRenderable, IHasRules
{
    private IFormField $field;
    private array $rules;
    private array $messages;

    public function __construct(IFormField $field)
    {
        $this->field = $field;
        $this->rules = [];
        $this->messages = [];
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
        return $renderer->renderRadio($this);
    }

    public function setRules(array $rules): void
    {
        $this->rules = $rules;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function setMessages(string $message)
    {
        $this->messages[] = $message;
    }
}
