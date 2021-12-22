<?php

namespace Rweiser\FormHandler;

interface IFormTemplate
{
    public function addToForm(Form $form): void;
}
