<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="../" class="logo">
            <h3>SISTEMA DE CUENCAS</h3>
            {{--<img src="" height="35" alt="Porto Admin" />--}}
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">



        <span class="separator"></span>


        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <h2><i class="fa fa-user"></i></h2>
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email=".com">
                    <span class="name">{{Auth::user()->name}}</span>

                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>

                    <li>
                        <form action="{{url('/logout')}}" method="post">
                            {!! csrf_field() !!}
                            <button class="btn btn-link">
                                <i class=" fa fa-power-off"></i>Salir
                            </button>
                        </form>                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->
