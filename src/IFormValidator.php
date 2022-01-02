<?php

namespace Rweiser\FormHandler;

interface IFormValidator
{
    function validate(Form $form): array;
}
