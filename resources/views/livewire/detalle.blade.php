@php
$personaje = App\Models\Personaje::find($id); // Buscar el personaje en la base de datos
if($personaje == null){
    // Si es nulo en base de datos consultar la api
    $personaje = Illuminate\Support\Facades\Http::get('https://rickandmortyapi.com/api/character/'.$id)->json();
    error_log(json_encode($personaje));
    error_log($personaje['image']);
}
@endphp

<div>

    <section class="p-5 m-5 grid grid-cols-2 gap-2 justify-center">
        <article class="col-span-2 text-center text-2xl">
            <p>Detalles de personaje</p>
        </article>
        <article class="col-span-2 justify-self-center">
            <img src="{{$personaje['image']}}" alt="Personaje" class="w-40 h-40 rounded-full" />
        </article>
        <article class="justify-center-self">
            <p>Tipo: {{$personaje['type'] ?: 'No especificado'}}</p>
            <p>Genero : {{$personaje['gender']}}</p>
        </article>
        <article class="justify-center-self">
            <p>Origen : {{$personaje['origin_name'] ?? $personaje['origin']['name']}}</p>
            <p>Localizacion : <a href="{{$personaje['origin_url'] ?? $personaje['origin']['url']}}">{{$personaje['origin_url'] ?? $personaje['origin']['url']}}</a></p>
        </article>
    </section>

</div>
