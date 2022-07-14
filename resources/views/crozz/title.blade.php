@extends('crozzmain')

@section('head')
    @include('crozzlayouts.head')
@endsection

@section('header')
    @include('crozzlayouts.header')
@endsection
@section('content')




    <div class="container-fluid content">
        <div class="row m-0">
            <div class="col">
                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th scope="col">Званя</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($description as $descriptions)
                        <tr data-href="3" class="all_of_stage">


                            {{--Званя--}}
                            <td>@if($descriptions['description']!=null)
                                    {{$descriptions['description']}}
                                @else -
                                @endif
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-label="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Створити</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('descriptionadd')}}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <div class="container">
                                        <div class="row pl-2 pt-3 mr-0">
                                            <div class="col mr-4">
                                                <div class="form-group row mb-2">
                                                    <label for="$description" class="col-sm-5">Звання</label>
                                                    <div class="col">
                                                        <input type="text" name="$description" class="form-control"
                                                               placeholder="Звання" id="$description">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="Create" class="btn btn-primary">Створити</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="search_category" tabindex="-1" aria-labelledby="search_category" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Пошук</h5>
                    <button type="button" class="btn-close btn-closes" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="search_cat">
                        <form class="d-flex justify-content-center">
                            <input type="search" id="search" class="w-25 form-control" placeholder="Пошук">
                        </form>
                        <div id="append_content"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="ok_category">ОК</button>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">

                <span class="page-link disabled">Назад</span>

            </li>
            <li class="page-item disabled">

            </li>
            <li class="page-item">

            </li>
            <li class="page-item">

            </li>
            <li class="page-item">

            </li>
            <li class="page-item active" aria-current="page">

                <span class="page-link">1</span>

            </li>
            <li class="page-item">

                <a class="page-link" href="http://support.ct.dod.ua/subscriber_group/?page=2">2</a>

            </li>
            <li class="page-item">

                <a class="page-link" href="http://support.ct.dod.ua/subscriber_group/?page=3">3</a>

            </li>
            <li class="page-item">

                <a class="page-link" href="http://support.ct.dod.ua/subscriber_group/?page=4">4</a>

            </li>
            <li class="page-item disabled">

                <span class="page-link" tabindex="-1" aria-disabled="true">...</span>

            </li>
            <li class="page-item">

                <a class="page-link" href="http://support.ct.dod.ua/subscriber_group/?page=2">Вперед</a>

            </li>
        </ul>
    </nav>






@endsection
@section('footer')
    @include('crozzlayouts.footer')
@endsection
