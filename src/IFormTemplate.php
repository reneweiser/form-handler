<?php

namespace Rweiser\FormHandler;

interface IFormTemplate
{
    public function addToForm(Form $form): void;

    public function getRules(): array;

    public function getTemplate(): array;

    public function getMessages(): array;
}
