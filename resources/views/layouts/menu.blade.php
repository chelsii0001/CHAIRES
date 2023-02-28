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
                @jefe
                    <li>
                        <a href="{{ route('cursos.registro') }}">
                            <span class="label">Registar Tutorias</span>
                        </a>
                    </li>
                @endjefe
                @admin
                    <li>
                        <a href="{{ route('cursos.index') }}">
                            <span class="label">Ver Tutorias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tutorias.fechas') }}">
                            <span class="label">Fechas de Entregas de Reporte</span>
                        </a>
                    </li>
                @endadmin
            </ul>
        </li>
        @admin
            <li>
                <a>
                    <i data-cs-icon="notebook-1" class="icon" data-cs-size="18"></i>
                    <span class="label">Asesorias</span>
                </a>
                <ul id="pages">
                    <li>
                        <a href="{{ route('asesorias.index') }}">
                            <span class="label">Ver Asesorias</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endadmin
        @jefe
            <li>
                <a>
                    <i data-cs-icon="notebook-1" class="icon" data-cs-size="18"></i>
                    <span class="label">Asesorias</span>
                </a>
                <ul id="pages">
                    <li>
                        <a href="{{ route('asesorias.index') }}">
                            <span class="label">Ver Asesorias</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endjefe
        <li>
            <a href="#registros">
                <i data-cs-icon="grid-5" class="icon" data-cs-size="18"></i>
                <span class="label">Registros</span>
            </a>
            <ul id="registros">
                @admin
                    <li>
                        <a href="{{ route('carrera.registro') }}">
                            <span class="label">Registar Carrera</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jefe.registro') }}">
                            <span class="label">Registar Jefe de Carrera</span>
                        </a>
                    </li>
                @endadmin
                @jefe
                    <li>
                        <a href="{{ route('grupo.registro') }}">
                            <span class="label">Registar Grupos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tutor.registro') }}">
                            <span class="label">Registar Tutor</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('grupo.asignacion') }}">
                            <span class="label">Asignacion Grupo Tutor</span>
                        </a>
                    </li>
                @endjefe
            </ul>
        </li>
    </ul>
</div>
