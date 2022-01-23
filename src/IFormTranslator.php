<?php

namespace Rweiser\FormHandler;

interface IFormTranslator
{
    public function translate(FormField $field): FormField;
    public function translateMessage(string $messageKey): string;
}
