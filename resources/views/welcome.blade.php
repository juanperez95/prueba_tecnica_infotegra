@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba tecnica infotegra</title>
    @livewireStyles
    @wireUiScripts
</head>
<body class="">
    @livewireScripts
    <section>
        <article>
            <article class="flex flex-row justify-center items-center bg-black">
                <img src="{{asset('assets/title.png')}}" alt="title" class="size-50 w-100 h-30">
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
                {{-- Llamar al componente de la table 'PersonajesTAble' y organizarlo en columnas --}}
                <section class="overflow-x-auto p-4 grid grid-cols-3">

                    {{--Tabla--}}
                    @if(!$data_api)
                        <article class="col-span-2">
                            @livewire('personajes-table')               
                        </article>
                    @else
                        <article class="col-span-2">
                            @livewire('api-table')
                        </article>
                    @endif

                </section>


            </section>
        </article>
    </section>
</body>
</html>