<?php

namespace Rweiser\FormHandler;

class NullFormValues implements IFormValues
{
    public function getValue(IFormField $field): string
    {
        return '';
    }

    public function getMessages(IHasRules $field): string
    {
        return '';
    }
}
