@extends('crozzmain')

@section('head')
    @include('crozzlayouts.head')
@endsection

@section('header')
    @include('crozzlayouts.header')
@endsection
@section('content')




    <div class="container-fluid content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row m-0">
            <div class="col">


                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th width="25%" class="sorting" data-sorting_type="asc" data-column_name="sn" style="cursor: pointer">ФІО<span id="id_icon"></span></th>
                        <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="homephone" style="cursor: pointer">АТС-2<span id="homephone_icon"></span></th>
                        <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="cn" style="cursor: pointer">ЗСУ-002<span id="cn_icon"></span></th>
                        <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="description" style="cursor: pointer">Званя<span id="description_icon"></span></th>
                        <th width="15%" class="sorting" data-sorting_type="asc" data-column_name="title" style="cursor: pointer">Посада<span id="title_icon"></span></th>
                        <th width="15%" class="sorting" data-sorting_type="asc" data-column_name="department" style="cursor: pointer">Підрозділ<span id="department_icon"></span></th>
                        <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="company" style="cursor: pointer">Військова частина<span id="company_icon"></span></th>
                        <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="physicaldeliveryofficename" style="cursor: pointer">Приміщення<span id="physicaldeliveryofficename_icon"></span></th>
                        <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="postofficebox" style="cursor: pointer">Будівля<span id="postofficebox_icon"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @include('crozz.paginationcontact')
                    </tbody>
                </table>


                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="cn" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Редагування</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('contactupdate')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <div class="container">
                                        <div class="row pl-2 pt-3 mr-0">
                                            <div class="col mr-4">
                                                {{--<input type="text" value="" id="cn" name="cn" class="d-none">--}}

                                                <div class="form-group row mb-2">
                                                    <label for="sn" class="col-sm-5">ПІП(Позивний):</label>
                                                    <div class="col">
                                                        <input type="text" name="sn" class="form-control"
                                                               placeholder="ПІП" id="sn"{{-- minlength="7"
                                                               required=""--}}>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="Rank" class="col-sm-5">Звання:</label>
                                                    <div class="col">
                                                        <select name="description" class="form-select" id="description"
                                                                {{--required=""--}}>
                                                            <option value="" id="descriptionselected" selected="selected">-----</option>
                                                            <option
                                                                value=""></option>
                                                            @foreach($description as $descriptions)
                                                                <option
                                                                    value="{{$descriptions['description']}}">{{$descriptions['description']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="title" class="col-sm-5">Посада:</label>
                                                    <div class="col">
                                                        <textarea name="title" cols="40" rows="2"
                                                                  class="form-control" id="title"
                                                                  placeholder="Посада" maxlength="64" {{--required="" data-bs-toggle="modal"--}}
                                                                  {{--data-bs-target="#search_category" minlength="8"
                                                                  required=""--}}></textarea>
                                                       {{-- <div id="search_position" class="search_cat_1">
                                                            <input type="text" id="Position_search" style="width:100%;"
                                                                   placeholder="Пошук">
                                                            <div id="append_position"></div>
                                                        </div>--}}
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="department" class="col-sm-5">Підрозділ:</label>
                                                    <div class="col">
                                                        <textarea name="department" cols="40" rows="2"
                                                                  class="form-control"
                                                                  id="department" placeholder="Підрозділ" maxlength="64" {{--required=""data-bs-toggle="modal"
                                                                  data-bs-target="#search_category"
                                                                  required=""--}}></textarea>
                                                        {{--<div id="search_unit" class="search_cat_1">
                                                            <input type="text" id="Unit_search" style="width:100%;"
                                                                   placeholder="Пошук">
                                                            <div id="append_unit"></div>
                                                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                {{--Кабінет--}}
                                                {{--physicalDeliveryOfficeName--}}
                                                <div class="form-group row mb-2">
                                                    <label for="physicaldeliveryofficename"
                                                           class="col-sm-5">Кабінет:</label>
                                                    <div class="col">
                                                        <input type="text" name="physicaldeliveryofficename"
                                                               class="form-control"
                                                               placeholder="Кабінет" id="physicaldeliveryofficename" {{--data-bs-toggle="modal"
                                                               data-bs-target="#search_category" required=""--}}>
                                                        {{--<div id="search_cabinet" class="search_cat">
                                                        </div>--}}
                                                    </div>
                                                </div>
                                                {{--Будівля--}}
                                                {{--postOfficeBox--}}
                                                <div class="form-group row mb-2">
                                                    <label for="postofficebox" class="col-sm-5">Будівля:</label>
                                                    <div class="col">
                                                        <input type="text" name="postofficebox" class="form-control"
                                                               placeholder="Будівля" id="postofficebox" {{--required=""--}}>
                                                        {{--<div id="search_build" class="search_cat">
                                                        </div>--}}
                                                    </div>
                                                </div>
                                                {{--АТС-2--}}
                                                {{--homephone--}}
                                                <div class="form-group row mb-2">
                                                    <label for="homephone" class="col-sm-5">ATC-2:</label>
                                                    <div class="col">
                                                        <input type="text" name="homephone" class="form-control"
                                                               placeholder="ATC-2" id="homephone">
                                                    </div>
                                                </div>


                                                {{--ЗСУ-002--}}
                                                {{--cn--}}
                                                <div class="form-group row mb-2">
                                                    <label for="cn" class="col-sm-5">ЗСУ-002</label>
                                                    <div class="col">
                                                        <input type="text" name="cn" class="form-control"
                                                               placeholder="ЗСУ-002" id="cn" readonly>
                                                    </div>
                                                </div>
                                                {{--Військова частина--}}
                                                {{--company--}}
                                                <div class="form-group row mb-2">
                                                    <label for="company" class="col-sm-5">Військова частина</label>
                                                    <div class="col">
                                                        <select name="company" class="form-select" id="company"
                                                                {{--required=""--}}>
                                                            <option value="" id="companyselected" selected="selected">-----</option>
                                                            @foreach($company as $companys)
                                                                <option
                                                                    value="{{$companys['company']}}">{{$companys['company']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" value="1" id="update" class="btn btn-outline-primary" name="Update">
                                Оновити
                            </button>
                            <button type="submit" value="1" id="delete" class="btn btn-danger" name="Delete">
                                Видалити
                            </button>
                        </div>
                    </form>
                </div>
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
                    <form method="post" action="">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">

                                    <div class="container">
                                        <div class="row pl-2 pt-3 mr-0">
                                            <div class="col mr-4">


                                                <div class="form-group row mb-2">
                                                    <label for="sn" class="col-sm-5">ПІП(Позивний):</label>
                                                    <div class="col">
                                                        <input type="text" name="sn" class="form-control"
                                                               placeholder="ПІП" id="sn" minlength="7"
                                                               {{--required=""--}}>
                                                    </div>
                                                </div>


                                                <div class="form-group row mb-2">
                                                    <label for="Rank" class="col-sm-5">Звання:</label>
                                                    <div class="col">
                                                        <select name="Rank" class="form-select" id="Rank"{{-- required=""--}}>
                                                            <option value="" selected="selected">-----</option>
                                                            @foreach($description as $descriptions)
                                                                <option
                                                                    value="{{$descriptions['id']}}">{{$descriptions['description']}}</option>
                                                            @endforeach


                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row mb-2">
                                                    <label for="title" class="col-sm-5">Посада:</label>
                                                    <div class="col">
                                                        <textarea name="title" cols="40" rows="2"
                                                                  class="form-control" id="title"
                                                                  placeholder="Посада" maxlength="64" {{--data-bs-toggle="modal"
                                                                  data-bs-target="#search_category" minlength="8"
                                                                  required=""--}}></textarea>
                                                        {{--<div id="search_position" class="search_cat_1">
                                                            <input type="text" id="Position_search" style="width:100%;"
                                                                   placeholder="Пошук">
                                                            <div id="append_position"></div>
                                                        </div>--}}
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="department" class="col-sm-5">Підрозділ:</label>
                                                    <div class="col">
                                                        <textarea name="department" cols="40" rows="2"
                                                                  class="form-control"
                                                                  id="department" maxlength="64" {{--required="" data-bs-toggle="modal"
                                                                  data-bs-target="#search_category"
                                                                  required=""--}}></textarea>
                                                        {{--<div id="search_unit" class="search_cat_1">
                                                            <input type="text" id="Unit_search" style="width:100%;"
                                                                   placeholder="Пошук">
                                                            <div id="append_unit"></div>
                                                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">

                                                {{--Кабінет--}}
                                                {{--physicalDeliveryOfficeName--}}
                                                <div class="form-group row mb-2">
                                                    <label for="physicaldeliveryofficename"
                                                           class="col-sm-5">Кабінет:</label>
                                                    <div class="col">
                                                        <input type="text" name="physicaldeliveryofficename"
                                                               class="form-control"
                                                               placeholder="Кабінет" id="physicaldeliveryofficename" {{--data-bs-toggle="modal"
                                                               data-bs-target="#search_category" required=""--}}>
                                                        {{--<div id="search_cabinet" class="search_cat">
                                                        </div>--}}
                                                    </div>
                                                </div>

                                                {{--Будівля--}}
                                                {{--postOfficeBox--}}
                                                <div class="form-group row mb-2">
                                                    <label for="postOfficeBox" class="col-sm-5">Будівля:</label>
                                                    <div class="col">
                                                        <input type="text" name="postOfficeBox" class="form-control"
                                                               placeholder="Будівля" id="Build" {{--required=""--}}>
                                                        <div id="search_build" class="search_cat">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--АТС-2--}}
                                                {{--homephone--}}
                                                <div class="form-group row mb-2">
                                                    <label for="homephone" class="col-sm-5">ATC-2:</label>
                                                    <div class="col">
                                                        <input value="" type="text" name="homephone" class="form-control"
                                                               placeholder="ATC-2" id="homephone">
                                                    </div>
                                                </div>


                                                {{--ЗСУ-002--}}
                                                {{--cn--}}
                                                <div class="form-group row mb-2">
                                                    <label for="cn" class="col-sm-5">ЗСУ-002</label>
                                                    <div class="col">
                                                        <input type="text" name="cn" class="form-control"
                                                               placeholder="ЗСУ-002" id="cn">
                                                    </div>
                                                </div>
                                                {{--Військова частина--}}
                                                {{--company--}}
                                                <div class="form-group row mb-2">
                                                    <label for="company" class="col-sm-5">Військова частина</label>
                                                    <div class="col">
                                                        <select name="company" class="form-select" id="Rank"
                                                                {{--required=""--}}>
                                                            <option value=""  selected="selected">-----</option>
                                                            @foreach($company as $companys)
                                                                <option
                                                                    value="{{$companys['id']}}">{{$companys['company']}}</option>
                                                            @endforeach
                                                        </select>
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






@endsection
@section('footer')
    @include('crozzlayouts.footer')
    <script>
        $(document).ready(function () {
            $('form').keydown(function(event){
                if(event.keyCode === 13) {
                    event.preventDefault();
                    return false;
                }
            });
            /*$(function () {
                $('body').on('click', 'th', function () {
                    //$('#username').text('value');
                    let urladd = "{route('main')}}";
                    let _token = '{ csrf_token() }}';
                    let th = $(this).text();
                    $('#username').text(th);
                    $.ajax({
                        url: urladd,
                        type: "GET",
                        data: ({
                            '_token': _token,
                            'th': th
                        }),
                        dataType: "json",
                        success: function (data) {
                            $('#username').text('th');
                            if ($.isEmptyObject(data.error)) {
                                alert(data.success);
                                location.reload();
                            } else {
                                printErrorMsg(data.error);
                            }

                        }
                    });
                });
            });*/

            $(function () {
                $('body').on('click', '.forms', function () {
                    let cn = $(this).attr('id');
                    let sn = $(this).children('#tdsn').text();
                    let description = $(this).children('#tddescription').text();
                    let title = $(this).children('#tdtitle').text();
                    let department = $(this).children('#tddepartment').text();
                    let company = $(this).children('#tdcompany').text();
                    let physicaldeliveryofficename = $(this).children('#tdphysicaldeliveryofficename').text();
                    let postofficebox = $(this).children('#tdpostofficebox').text();
                    let homephone = $(this).children('#tdhomephone').text();

                    $('#cn').attr('value', cn.trim());
                    $('#sn').attr('value', sn.trim());
                    $('#title').text(title.trim());
                    $('#descriptionselected').text(description.trim());
                    $('#descriptionselected').attr('value', description.trim());
                    $('#department').text(department.trim());
                    $('#companyselected').text( company.trim());
                    $('#companyselected').attr('value', company.trim());
                    $('#physicaldeliveryofficename').attr('value', physicaldeliveryofficename.trim());
                    $('#postofficebox').attr('value', postofficebox.trim());
                    $('#homephone').attr('value', homephone.trim());

                });
            });
            function clear_icon()
            {
                $('#id_icon').html('');
                $('#post_title_icon').html('');
            }
            function fetch_data(page, sort_type, sort_by, query)
            {

                $('#username').text(page)
                let _token = '{{ csrf_token() }}';
                let urladd = "/fetch_data";
                $.ajax({
                    url: urladd,
                    type: "get",
                    data: ({
                        '_token': _token,
                        'page': page,
                        'sortby': sort_by,
                        'sorttype': sort_type,
                        'query': query
                    }),
                    dataType: "html",
                    success:function(data)
                    {
                        //$('#username').text(query);
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                });

            }
            $(document).on('keyup', '#serach', function(event){

                let page = 1;
                //$('#hidden_page').val(page);
                let column_name = $('#hidden_column_name').val();
                let sort_type = $('#hidden_sort_type').val();

                let query = $('#serach').val();

                //$('li').removeClass('active');
                //$(this).parent().addClass('active');

                fetch_data(page,  sort_type,column_name, query);
            });
            $(document).on('click', '.sorting', function(){


                let column_name = $(this).data('column_name');

                let order_type = $(this).data('sorting_type');
                let reverse_order = '';
                if(order_type == 'asc')
                {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    clear_icon();
                    $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
                }
                if(order_type == 'desc')
                {
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    clear_icon
                    $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#serach').val();
                fetch_data(page, reverse_order, column_name, query);
            });
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#serach').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });
            /*$('#createadd').on("click", function () {
                let post_office_boxadd = $('#post_office_boxadd').val();
                let urladd = "{route('post_office_boxadd')}}";
                let _token = '{ csrf_token() }}';
                $.ajax({
                    url: urladd,
                    type: "POST",
                    data: ({
                        '_token': _token,
                        'post_office_boxadd': post_office_boxadd
                    }),
                    dataType: "json",
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            alert(data.success);
                            location.reload();
                        } else {
                            printErrorMsg(data.error);
                        }

                    }
                });
            });*/
            //По нажатию кнопки делет
            /*$('#delete').on("click", function () {
                let cn = $('.d-none#id').val();
                let urladd = "{route('contactupdate')}}";
                let _token = '{ csrf_token() }}';
                $.ajax({
                    url: urladd,
                    type: "POST",
                    data: ({
                        '_token': _token,
                        'post_office_boxadd': post_office_boxadd
                    }),
                    dataType: "json",
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            alert(data.success);
                            location.reload();
                        } else {
                            printErrorMsg(data.error);
                        }

                    }
                });
            });*/


        });
    </script>
@endsection
