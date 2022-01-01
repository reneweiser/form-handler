<?php

namespace Rweiser\FormHandler;

class MockFormRenderer implements IFormRenderer
{
    public function render(Form $form): string
    {
        return $form->fields()->reduce(function (string $acc, IRenderable $field) {
            return $acc . $field->render($this);
        }, '');
    }

    public function renderSingleLine(SingleLine $field): string
    {
        return ";SingleLine:" . $field->getName();
    }

    public function renderParagraph(Paragraph $field): string
    {
        return ";Paragraph:" . $field->getName();
    }

    public function renderRadio(Radio $field): string
    {
        return ";Radio:" . $field->getName();
    }

    public function renderGroup(Section $group): string
    {
        return collect($group->getFields())->reduce(function (string $acc, IRenderable $field) {
            return $acc . $field->render($this);
        }, '-Group>'.$group->getName());
    }

    public function renderSelection(Selection $field): string
    {
        return ";Selection:" . $field->getName();
    }

    public function renderTextBlock(TextBlock $textBlock): string
    {
        return ";TextBlock:" . $textBlock->getName();
    }

    public function renderAlert(Alert $param): string
    {
        return ";Alert:" . $param->getName();
    }

    public function renderHtml(HtmlBlock $param): string
    {
        return ";Html:" . $param->getName();
    }

    public function renderCheck(Check $field): string
    {
        return ";Check:" . $field->getName();
    }
}
