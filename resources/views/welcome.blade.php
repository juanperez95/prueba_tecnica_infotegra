<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{--Icono favicon--}}
        <link rel="icon" href="{{asset('assets/favicon.ico')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('css/generales.css')}}">
        <title>Prueba tecnica infotegra</title>
        @livewireStyles
        @wireUiScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
    @livewireScripts
    {{--Imagen de fondo --}}
    <section class="fondo">

    </section>
    <section class="content">
        <article>
            {{--titulo en la barra inicial--}}
            <article class="flex flex-row justify-center items-center bg-black">
                <img src="{{asset('assets/title.png')}}" alt="title" class="size-50 w-100 h-30 title">
            </article>
            <section class="p-2 mt-10">
                <section class="grid md:grid-cols-2 grid-cols-1">
                    <article class="ml-5 flex flex-row gap-6">
                        @livewire('components.boton',['data'=>$data_api])
                        {{--Boton para limpiar toda la base de datos (Opcional)--}}
                        <a href="{{route('limpiarDatos')}}">
                            <button class="p-3 mt-3 text-white bg-green-600 duration-150 transition-ease-in-out rounded-md hover:bg-green-800 disabled:bg-green-300 sm:h-12">Limpiar base de datos (Volver al consumo de la API)</button>
                        </a>
                    </article>
                    <article class="p-3 mt-3">
                        <x-alert title="Informacion de consulta a datos" info>
                            @if(!$data_api)
                                <x-alert title="Usando base de datos"></x-alert>
                                
                            @else
                                <x-alert title="Usando API"></x-alert>
                            @endif
                        </x-alert>
                    </article>
                </section>
                {{-- Llamar al componente de la table 'PersonajesTAble' y organizarlo en columnas --}}
                <section class="overflow-x-auto p-2 grid grid-cols-3">

                    {{--Tabla--}}
                    @if(!$data_api)
                        <article class="xl:col-span-2 col-span-3">
                            @livewire('personajes-table')               
                        </article>
                    @else
                        <article class="xl:col-span-2 col-span-3">
                            @livewire('api-table')
                        </article>
                    @endif

                    {{--Imagenes laterales--}}
                    
                </section>


            </section>
        </article>
    </section>
    {{--Seccion para el pie de pagina--}}
    <section class="bg-black text-white h-33 flex justify-center items-center">
        <article class="text-white p-5 flex flex-col justify-between items-center gap-10">
            {{--Imagen de infotegra para citar quien hace la prueba tecnica--}}
            <a href="https://www.infotegra.com/" target="_blank">
                <img src="{{asset('assets/infotegra.png')}}" alt="infotegra" class="">
            </a>
        </article>
    </section>
    <script src="{{asset('js/scroll.js')}}"></script> {{--Llamar archivo js para scroll--}}
</body>
</html>