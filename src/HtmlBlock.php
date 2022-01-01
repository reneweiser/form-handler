<?php

namespace Rweiser\FormHandler;

class HtmlBlock implements IRenderable
{
    private string $html;

    public function __construct(string $html)
    {
        $this->html =$html;
    }

    public function html(): string
    {
        return $this->html;
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderHtml($this);
    }

    public function getLabel(): string
    {
        return '';
    }

    public function getName(): string
    {
        return '';
    }
}
