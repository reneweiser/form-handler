<?php

namespace Rweiser\FormHandler;

class FieldFactory
{
    public static function create($fieldData, IFormTranslator $translator): IFormField
    {
        $field = new FormField($fieldData['label'], $fieldData['name']);
        $field = $translator->translate($field);

        switch ($fieldData['type'])
        {
            case 'section':
                $section = new Section($field);
                collect($fieldData['fields'])->each(fn ($sectionField) => $section->addField(FieldFactory::create($sectionField, $translator)));
                return $section;
            case 'paragraph':
                $paragraph = new Paragraph($field);
                $paragraph->setRules(FieldFactory::filterRules($fieldData));
                $paragraph->setMessages($fieldData['message']);

                return $paragraph;
            case 'radio':
                $radio = new Radio($field);
                $radio->setRules(FieldFactory::filterRules($fieldData));
                $radio->setMessages($fieldData['message']);

                return $radio;
            case 'check':
                $check = new Check($field);
                $check->setRules(FieldFactory::filterRules($fieldData));
                $check->setMessages($fieldData['message']);

                return $check;
            case 'selection':
                $selection = new Selection($field);
                $selection->setRules(FieldFactory::filterRules($fieldData));
                $selection->setMessages($fieldData['message']);

                return $selection;
            case 'single-line':
                $singleLine = new SingleLine($field);
                $singleLine->setRules(FieldFactory::filterRules($fieldData));
                $singleLine->setMessages($fieldData['message']);

                return $singleLine;
            case 'text-block':
                return new TextBlock($field);
            case 'alert':
                return new Alert($field);
            default:
                return new NullField();
        }
    }

    private static function filterRules(array $fieldData): array
    {
        $ruleProps = collect([
            'min',
            'max',
            'required',
        ]);

        return $ruleProps->reduce(function ($acc, $cur) use ($fieldData) {
            if (!isset($fieldData[$cur]))
                return $acc;

            if (!$fieldData[$cur])
                return $acc;

            if (is_bool($fieldData[$cur])) {
                $acc[] = $cur;
                return $acc;
            }

            $acc[$cur] = $fieldData[$cur];
            return $acc;
        }, []);
    }
}
