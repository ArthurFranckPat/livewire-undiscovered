@php use Illuminate\Support\Facades\Blade; @endphp
    <!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>
<body class="grid place-items-center min-h-screen bg-gray-100">
{!! livewire(\App\Http\Livewire\Counter::class) !!}
</body>


</html>

<?php
function livewire($class)
{
    $component = new $class;
    return Blade::render($component->render(), getProperties($component));
};
function getProperties($component): array
{
    $properties = [];
    $reflectedProperties = (new ReflectionClass($component))->getProperties(ReflectionProperty::IS_PUBLIC);
    foreach ($reflectedProperties as $property) {
        $properties[$property->getName()] = $property->getValue($component);
    };
    return $properties;
}

