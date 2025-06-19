@vite(['resources/css/app.css', 'resources/js/app.js']) {{--Cargar tailwind y estilos--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    @livewireStyles
    @wireUiScripts
    @livewireScripts 
</head>
<body class="">
    <section class="bg-slate-800">
        <article class="flex flex-row justify-center items-center bg-black">
                <img src="{{asset('assets/title.png')}}" alt="title" class="size-50 w-100 h-30">
        </article>
    </section>
    {{--Section principalpara tener el orden de la pagina--}}
    <section class="grid grid-cols-2 gap-5 p-20">
        <section class="flex justify-center items-center p-6">
            <img src="{{$personaje->image}}" alt="{{$personaje->name}}" class="w-60 h-60 rounded-full" />
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
</body>
</html>