<?php

namespace Rweiser\FormHandler;

class MockTrueValidator implements IFormValidator
{

    function isValid(Form $form): array
    {
        return [];
    }
}
