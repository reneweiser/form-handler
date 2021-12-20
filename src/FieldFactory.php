<?php

namespace Rweiser\FormHandler;

class FieldFactory
{
    public static function create($fieldData): IRenderable
    {
        switch ($fieldData['type'])
        {
            case 'section':
                return new Section($fieldData);
            case 'paragraph':
                return new Paragraph($fieldData);
            case 'radio':
                return new Radio($fieldData);
            case 'check':
                return new Check($fieldData);
            case 'selection':
                return new Selection($fieldData);
            case 'single-line':
                return new SingleLine($fieldData);
            case 'text-block':
                return new TextBlock($fieldData);
            case 'alert':
                return new Alert($fieldData);
            default:
                return new NullField();
        }
    }
}
