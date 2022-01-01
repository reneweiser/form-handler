<?php

namespace Rweiser\FormHandler;

interface IFormTranslator
{
    public function translate(FormField $field): FormField;
}
