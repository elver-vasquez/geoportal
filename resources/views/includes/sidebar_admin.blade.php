<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
           Menu
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a href="{{url('admin/inicio')}}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/remas')}}">

                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>REMAS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/remfc')}}">

                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>REMFC</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/remli')}}">

                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>REMLI</span>
                        </a>
                    </li>



                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>Mapas</span>
                        </a>
                        <ul class="nav nav-children">

                            <li>
                                <a href="{{url('admin/tdps')}}">
                                   TDPS
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin/zonashidrologicas')}}">
                                   Zonas Hidrologicas
                                </a>
                            </li>





                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>Cuencas</span>
                        </a>
                        <ul class="nav nav-children">
                    <li>
                        <a href="{{url('admin/cuencas')}}">
                            Cuenca Poopo
                        </a>
                    </li>
                            <li>
                                <a href="{{url('admin/cuencacoipasa')}}">
                                    Cuenca Coipasa
                                </a>
                            </li>
                            </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->rol=='admin')
                    <li>

                        <a href="{{url('admin/usuarios')}}">

                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>USUARIOS</span>
                        </a>
                    </li>
                    @endif

                    <li>
                        <form action="{{url('/logout')}}" method="post">
                            {!! csrf_field() !!}
                        <button class="btn btn-link">
                            <i class=" fa fa-power-off"></i>Salir
                        </button>
                        </form>
                    </li>

                </ul>
            </nav>




        </div>

    </div>

</aside>
<!-- end: sidebar -->