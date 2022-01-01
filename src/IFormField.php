<?php

namespace Rweiser\FormHandler;

interface IFormField
{
    function getLabel(): string;
    function getName(): string;
}
