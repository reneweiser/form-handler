<?php

namespace Rweiser\FormHandler;

interface IFormValidator
{
    function isValid(Form $form): array;
}
