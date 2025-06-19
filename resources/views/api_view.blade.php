@vite(['resources/css/app.css', 'resources/js/app.js']) {{--Cargar tailwind y estilos--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--Icono favicon--}}
    <link rel="icon" href="{{asset('assets/favicon.ico')}}" type="image/x-icon">
    <title>{{$personaje->name}}</title>
    {{--Importar los metodos para que funcione livewire y wireui--}}
    @livewireStyles
    @wireUiScripts
    @livewireScripts 
    {{--Llamar css de estilos globales--}}
    <link rel="stylesheet" href="{{asset('css/generales.css')}}">
</head>
<body class="">
    {{--Titulo de la barra inicial--}}
    <section class="bg-slate-800">
        <article class="flex flex-row justify-center items-center bg-black">
                <img src="{{asset('assets/title.png')}}" alt="title" class="size-50 w-100 h-30 title">
        </article>
    </section>
    {{--Seccion principal para tener el orden de la pagina--}}
    <section class="grid grid-cols-2 gap-3 p-10">
        <section class="flex justify-center items-center p-6">
            <img src="{{$personaje->image}}" alt="{{$personaje->name}}" class="w-60 h-60 rounded-full imagenes" />
            <h2 class="text-2xl text-center m-10">{{$personaje->name}}</h2>
        </section>
        {{-- Formulario de edicion para el personaje --}}
        <section class="p-4 flex flex-col justify-start items-center">
            <article>
                <form action="{{route('guardarEdicion',['id'=>$personaje->id])}}" class="grid grid-cols-3 gap-5 p-5" method="POST">
                    @csrf
                    {{-- ID --}}
                    <x-number label="ID" name="id" value="{{$personaje->id}}" icon="user" class="col-span-3" disabled/>
                    {{-- campos basicos de los personajes --}} 
                    <x-input label="Nombre" name="name" value="{{$personaje->name}}" icon="user-circle"></x-input>
                    <x-select label="Estado" name="status" placeholder="Seleccione un estado" :options="['Alive','Dead','unknown']" value="{{$personaje->status}}" selected="{{$personaje->status}}"></x-select>
                    <x-input label="Especie" name="species" value="{{$personaje->species}}" icon="user"></x-input>
                    {{-- Campos de detalles --}}
                    <legend class="col-span-3">
                        <h3 class="text-2xl text-center ">Detalles de personaje</h3>
                    </legend>
                    <x-input label="Tipo" name="type" value="{{$personaje->type}}" icon="eye-dropper"></x-input>
                    <x-select label="Genero" name="gender" placeholder="Seleccione un genero" :options="['Male','Female','unknown','Genderless']" value="{{$personaje->gender}}" selected="{{$personaje->gender}}"></x-select>
                    <x-input label="Origen" name="origin_name" value="{{$personaje->origin_name}}" icon="globe-americas"></x-input>
                    {{--Botones para interactuar con el formulario --}}
                    <article class="col-span-3 grid grid-cols-2 gap-5 p-5">
                        <button class="bg-green-600 p-3 text-white rounded-md transition-ease-in-out duration-150 hover:bg-green-700" type="submit">
                            Guardar
                        </button>
                        <a href="{{route('getPersonajes')}}" class="bg-slate-800 p-3 text-white text-center rounded-md transition-ease-in-out duration-150 hover:bg-slate-900">
                            <button class="" type="button">
                                Cancelar
                            </button>
                        </a>
                    </article>
                </form>
            </article>
        </section>
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
</body>
</html>