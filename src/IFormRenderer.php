<?php

namespace Rweiser\FormHandler;

interface IFormRenderer
{
    public function render(Form $form): string;
    public function renderSingleLine(SingleLine $field): string;
    public function renderParagraph(Paragraph $field): string;
    public function renderRadio(Radio $field): string;
    public function renderDateTime(DateTime $field): string;
}
