<?php

namespace Rweiser\FormHandler;

use Illuminate\Support\Collection;

class Form implements IRenderable
{
    private Collection $fields;
    private string $name;
    private string $url;

    public function __construct(string $name)
    {
        $this->fields = collect([]);
        $this->name = $name;
    }

    public function setActionUrl(string $actionUrl): void
    {
        $this->url = $actionUrl;
    }

    public function actionUrl(): string
    {
        return $this->url;
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->render($this);
    }

    public function addTemplate(IFormTemplate $template): void
    {
        $template->addToForm($this);
    }

    public function addField(IRenderable $field): void
    {
        $this->fields->add($field);
    }

    public function fields(): Collection
    {
        return $this->fields;
    }

    public function getLabel(): string
    {
        return $this->name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
