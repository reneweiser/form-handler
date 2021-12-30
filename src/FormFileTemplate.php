<?php

namespace Rweiser\FormHandler;

use Symfony\Component\Yaml\Yaml;

class FormFileTemplate implements IFormTemplate
{
    private array $template;

    public function __construct(string $fileName)
    {
        $content = file_get_contents($fileName);
        $contentArray = Yaml::parse($content);
        $this->template = $contentArray;
    }

    public function addToForm(Form $form): void
    {
        collect($this->template)->each(fn ($item) => $form->addField(FieldFactory::create($item)));
    }

    public function getTemplate(): array
    {
        return $this->template;
    }

    public function getRules(): array
    {
        return collect($this->template)->reduce(function ($acc, $cur) {
            $acc[$cur['name']] = $this->parseRules($cur['rules']);

            return $acc;
        }, []);
    }

    public function getMessages(): array
    {
        return collect($this->template)->reduce(function ($acc, $cur) {
            $acc[$cur['name']] = $cur['message'];

            return $acc;
        }, []);
    }

    private function parseRules(array $rawRules): array
    {
        return collect($rawRules)->reduce(function ($acc, $cur, $key) {
            if ($cur === true) {
                $acc[] = $key;
                return $acc;
            }

            if ($cur === false)
                return $acc;

            $acc[$key] = $cur;
            return $acc;
        }, []);
    }
}
