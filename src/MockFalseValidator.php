<?php

namespace Rweiser\FormHandler;

class MockFalseValidator implements IFormValidator
{

    function validate(Form $form): array
    {
        return ['some message'];
    }
}
