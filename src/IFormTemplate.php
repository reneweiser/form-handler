<?php

namespace Rweiser\FormHandler;

interface IFormTemplate
{
    public function createForm(string $formFormName): Form;
}
