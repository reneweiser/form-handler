<?php

namespace Rweiser\FormHandler;

class HtmlBlock implements IRenderable
{
    private string $html;

    public function __construct(string $html)
    {
        $this->html =$html;
    }

    public function label(): string
    {
        return '';
    }

    public function name(): string
    {
        return '';
    }

    public function html(): string
    {
        return $this->html;
    }

    public function render(IFormRenderer $renderer): string
    {
        return $renderer->renderHtml($this);
    }
}
