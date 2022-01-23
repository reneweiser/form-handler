<?php

namespace Rweiser\FormHandler;

class NullTranslator implements IFormTranslator
{
    public function translate(FormField $field): FormField
    {
        return new FormField($field->getLabel(), $field->getName());
    }

    public function translateMessage(string $messageKey): string
    {
        return '';
    }
}
