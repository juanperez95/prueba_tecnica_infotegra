@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba tecnica</title>
    @livewireStyles
    @wireUiScripts
</head>
<body>
    @livewireScripts
    <section>
        <article>
            <article class="flex flex-row justify-center items-center bg-slate-800">
                <h2 class="text-4xl text-center p-5 text-white">Bienvenido a la API de Rick and Morty</h2>
            </article>
            <section class="p-2 mt-10">
                <section class="grid grid-cols-2">
                    <article class="ml-5 flex flex-row">
                        @livewire('components.boton',['data'=>$data_api])
                    </article>
                    <article class="p-3 mt-3">
                        <x-alert title="Informacion de consulta a datos" info>
                            @if(!$data_api)
                                <x-alert title="Usando base de datos" ></x-alert>
                            @else
                                <x-alert title="Usando API" ></x-alert>
                            @endif
                        </x-alert>
                    </article>
                </section>
                {{-- Llamar al componente de la table 'PersonajesTAble' --}}
                @livewire('personajes-table')
            </section>
        </article>
    </section>
</body>
</html>