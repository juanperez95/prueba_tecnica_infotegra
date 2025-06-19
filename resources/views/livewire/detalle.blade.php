@php
// Vista que se utiliza para mostrar los detalles del personaje dentro del datatable
$personaje = App\Models\Personaje::find($id); // Buscar el personaje en la base de datos
if($personaje == null){
    // Si es nulo en base de datos consultar la api y mostrar los datos en base al consumo
    $personaje = Illuminate\Support\Facades\Http::get('https://rickandmortyapi.com/api/character/'.$id)->json();
}
@endphp

<div>

    {{--Mostrar detalles de personaje
        imagen
        -----
        tipo
        genero
        origen
        localizacion
    --}}
    <section class="p-5 m-5 grid grid-cols-2 gap-2 justify-center items-center gap-2">
        <article class="col-span-2 text-center text-2xl">
            <p>Detalles de personaje</p>
        </article>
        <article class="justify-self-center">
            <img src="{{$personaje['image']}}" alt="Personaje" class="w-40 h-40 rounded-full imagenes" />
        </article>
        <article class="justify-center-self">
            <p>Tipo: {{$personaje['type'] ?: 'No especificado'}}</p>
            <p>Genero : {{$personaje['gender']}}</p>
            <p>Origen : {{$personaje['origin_name'] ?? $personaje['origin']['name']}}</p>
            <p>Localizacion : <a class="text-green-600" href="{{$personaje['origin_url'] ?? $personaje['origin']['url']}}">{{$personaje['origin_url'] ?? $personaje['origin']['url'] != '' ? 'Ubicacion del personaje' : 'Personaje sin url'}}</a></p>
        </article>
    </section>

</div>
