<?php

namespace Rweiser\FormHandler;

class FormValidator
{
    private IFormTemplate $formTemplate;

    public function __construct(IFormTemplate $formTemplate)
    {
        $this->formTemplate = $formTemplate;
    }
}
