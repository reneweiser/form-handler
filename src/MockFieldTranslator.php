<?php

namespace Rweiser\FormHandler;

class MockFieldTranslator implements IFormTranslator
{
    public function translate(FormField $field): FormField
    {
        return $field;
    }

    public function translateMessage(string $messageKey): string
    {
        return 'translated';
    }
}
