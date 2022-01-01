<?php

namespace Rweiser\FormHandler;

use Illuminate\Support\Collection;
use Symfony\Component\Yaml\Yaml;

class FormFileTemplate implements IFormTemplate
{
    private Collection $template;

    public function __construct(string $fileName)
    {
        $content = file_get_contents($fileName);
        $contentArray = Yaml::parse($content);
        $this->template = collect($contentArray)->map(fn ($fieldData) => FieldFactory::create($fieldData));
    }

    public function addToForm(Form $form): void
    {
        $this->template->each(fn (IRenderable $field) => $form->addField($field));
    }

    public function getTemplate(): array
    {
        return $this->template->toArray();
    }

    public function getRules(): array
    {
        return $this->template
            ->reduce(fn (array $acc, IHasRules $cur) => array_merge($acc, $cur->getRules()), []);
    }

    public function getMessages(): array
    {
        return $this->template
            ->reduce(function (array $acc, IHasRules $cur) {
                $messages = $cur->getMessages();
                if (count($messages) === 0)
                    return $acc;

                return array_merge($acc, $messages);
            }, []);
    }

    public function getFields(): array
    {
        return $this->template->toArray();
    }
}
