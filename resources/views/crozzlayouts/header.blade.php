<header class="align-items-center bg-dark" style="height:51px;">
    <ul class="nav">
        <li class="nav-item">
            <div class="collapse" id="navbarToggleExternalContent" style="position: absolute; width: 100%; padding-left: 58px;">
                <div class="bg-dark" style="height: 51px; width: 100%; font-size: 1.3rem">
                    <ul class="nav align-content-center nav-pills" style="height: 100%;">
                        <li class="nav-item">
                            <a href="{{ route('main')}}" class="nav-link text-white">Абонент</a>
                        </li>
                       {{-- <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#dropdown" href="#" role="button" aria-expanded="false">Номери</a>
                            <ul class="dropdown-menu bg-dark" id="dropdown">
                                <li><a class="dropdown-item text-white" href="{{ route('department')}}">ATC-2</a></li>
                                <li><a class="dropdown-item text-white" href="http://support.ct.dod.ua/subscriber_group/atc-20">ATC-2(0)</a></li>
                                <li><a class="dropdown-item text-white" href="http://support.ct.dod.ua/subscriber_group/mats">MATS</a></li>
                                <li><a class="dropdown-item text-white" href="http://support.ct.dod.ua/subscriber_group/atc-10">ATC-10</a></li>
                                <li>
                                    <hr class="dropdown-divider text-white">
                                </li>
                            </ul>
                        </li>--}}
                        {{--<li class="nav-item"><a class="nav-link text-white" href="{{ route('department')}}" id="unit">Підрозділ</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('position')}}" id="position">Посада</a></li>--}}
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('description')}}">Звання</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('company')}}">Військова частина</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('post_office_box')}}">Будівля</a></li>

                    </ul>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark" style="padding-bottom: unset;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </li>
        <li class="nav-item">
            <a href="" data-bs-target="#Create" data-bs-toggle="modal" class="nav-link"><svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fas fa-plus"></i> --></a>
        </li>
        <div class="d-flex align-items-center ml-2">
            <input type="search" aria-label="Search" placeholder="Пошук" id="serach" class="form-control" style="height: 39px;">
        </div>
        <li class="nav-item">
            <span class="nav-link UserName" id='username' style="color: white; font-size: 21px;">{{$user->name}}</span>
        </li>
        <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link exit"><svg class="svg-inline--fa fa-power-off fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="power-off" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M400 54.1c63 45 104 118.6 104 201.9 0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4 7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31-41.5 30.8-68 79.6-68 134.9-.1 92.3 74.5 168.1 168 168.1 91.6 0 168.6-74.2 168-169.1-.3-51.8-24.7-101.8-68.1-134-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z"></path></svg><!-- <i class="fas fa-power-off"></i> --></a>
        </li>
    </ul>
</header>

{{--@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror--}}
