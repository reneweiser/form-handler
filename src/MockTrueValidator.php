<?php

namespace Rweiser\FormHandler;

class MockTrueValidator implements IFormValidator
{

    function validate(Form $form): array
    {
        return [];
    }
}
