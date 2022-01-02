<?php

namespace Rweiser\FormHandler;

interface IFormValues
{
    public function getValue(IFormField $field);
    public function getMessages(IHasRules $field);
}
