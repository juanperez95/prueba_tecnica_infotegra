<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Principal</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @livewireStyles
</head>
<body>
    @livewireScripts
    <section>
        <article>
            <h2>Bienvenido a la API de Rick and Morty</h2>
            {{-- Llamar los componenetes del boton --}}
            @livewire('components.boton')
            <section class="p-2 mt-10">
                @livewire('user-table')
            </section>
        </article>
    </section>
</body>
</html>