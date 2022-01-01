<?php

namespace Rweiser\FormHandler;

class MockFalseValidator implements IFormValidator
{

    function isValid(Form $form): array
    {
        return ['some message'];
    }
}
