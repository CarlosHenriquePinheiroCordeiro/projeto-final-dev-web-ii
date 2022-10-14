<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>@yield('titulo')</title>
    </head>
    <body>
        @component('salaVirtual.nav')@endcomponent
        @yield('conteudo')
    </body>
</html>