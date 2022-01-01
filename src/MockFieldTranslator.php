<?php

namespace Rweiser\FormHandler;

class MockFieldTranslator implements IFormTranslator
{
    public function translate(FormField $field): FormField
    {
        return new FormField('Translated', $field->getName());
    }
}
