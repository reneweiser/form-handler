<?php

namespace Rweiser\FormHandler;

interface IHasRules
{
    function getName(): string;
    function getRules(): array;
    function getMessages(): array;
}
