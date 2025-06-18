<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Boton extends Component
{
    public $contador = 0;

    public function incrementar()
    {
        $this->contador++;
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
            <section>
                <article>
                    <button type="button" wire:click="incrementar">Este es un boton componetizado {{$contador}}</button>
                </article>
            </section>
        </div>
        HTML;
    }
}
