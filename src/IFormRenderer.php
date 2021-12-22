<?php

namespace Rweiser\FormHandler;

interface IFormRenderer
{
    public function render(Form $form): string;

    public function renderSingleLine(SingleLine $field): string;

    public function renderParagraph(Paragraph $field): string;

    public function renderRadio(Radio $field): string;

    public function renderDateTime(DateTime $field): string;

    public function renderGroup(Section $group): string;

    public function renderSelection(Selection $field): string;

    public function renderTextBlock(TextBlock $textBlock): string;

    public function renderAlert(Alert $param);

    public function renderHtml(HtmlBlock $param);
}
