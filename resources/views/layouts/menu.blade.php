<div class="menu-container flex-grow-1">
    <ul id="menu" class="menu">
        <li>
            <a href="{{ route('index') }}">
                <i data-cs-icon="home" class="icon" data-cs-size="18"></i>
                <span class="label">Dashboard</span>
            </a>
        </li>
        <li>
            <a>
                <i data-cs-icon="notebook-1" class="icon" data-cs-size="18"></i>
                <span class="label">Tutorias</span>
            </a>
            <ul id="pages">
                @if (Auth::user()->tipo == 1)
                    <li>
                        <a href="{{ route('cursos.registro') }}">
                            <span class="label">Registar Tutorias</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('cursos.index') }}">
                        <span class="label">Ver Tutorias</span>
                    </a>
                </li>
            </ul>
        </li>
        @if (Auth::user()->tipo == 1)
            <li>
                <a href="#registros">
                    <i data-cs-icon="grid-5" class="icon" data-cs-size="18"></i>
                    <span class="label">Registros</span>
                </a>
                <ul id="registros">
                    <li>
                        <a href="{{ route('maestros.registro') }}">
                            <span class="label">Registar Maestros</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('alumnos.registro') }}">
                            <span class="label">Registar Alumnos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('grupo.registro') }}">
                            <span class="label">Registar Grupos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('carrera.registro') }}">
                            <span class="label">Registar Carrera</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>
