<?php

namespace Rweiser\FormHandler;

class TextBlock implements IFormField, IRenderable, IHasRules
{
    private IFormField $field;
    private string $content;

    public function __construct(IFormField $field)
    {
        $this->field = $field;
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
        return $renderer->renderTextBlock($this);
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    function getRules(): array
    {
        return [];
    }

    function getMessages(): array
    {
        return [];
    }
}
