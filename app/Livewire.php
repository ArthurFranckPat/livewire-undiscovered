<?php

namespace App;

use Illuminate\Support\Facades\Blade;
use ReflectionClass;
use ReflectionProperty;

class Livewire
{
    function initialRender($class): string
    {
        $component = new $class;
        $snapshot = [
            'class' => get_class($component),
            'data' => $this->getProperties($component)
        ];
        $html = Blade::render($component->render(), $this->getProperties($component));
        $snapshotAttribute = htmlentities(json_encode($snapshot));
        return <<<HTML
            <div wire:snapshot="{$snapshotAttribute}">
            {$html}
        </div>
        HTML;

    }
    function getProperties($component): array
    {
        $properties = [];
        $reflectedProperties = (new ReflectionClass($component))->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($reflectedProperties as $property) {
            $properties[$property->getName()] = $property->getValue($component);
        };
        return $properties;
    }
}
