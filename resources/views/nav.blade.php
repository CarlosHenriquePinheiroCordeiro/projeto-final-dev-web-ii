<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('salaVirtual.index')}}">Salas Virtuais</a>
            </li>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('disciplina.index')}}">Disciplinas</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pessoas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('usuario.index')}}">Usuários</a>
                    <a class="dropdown-item" href="{{route('endereco.index')}}">Endereços</a>
                </div>
            <li class="nav-item">
                <a class="nav-link" href="{{route('estado.index')}}">Estados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cidade.index')}}">Cidades</a>
            </li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <form @submit.prevent="logout()">
            @csrf
            <button as="button" type="submit">
                Sair
            </button>
        </form>
    </div>
</nav>