<?php

namespace App\Http\Livewire;

class Counter
{
    public int $count = 0;


    function render(): string
    {
        return <<<'HTML'
    <div class="h-1/3 aspect-square text-4xl bg-white font-bold rounded-full border-black border-2 flex gap-4 items-center justify-center">
    <h1> {{ $count }}</h1>
    <button wire:click="increment" class="bg-green-200 h-12 w-12 rounded-full">+</button>
</div>
HTML;

    }


}
