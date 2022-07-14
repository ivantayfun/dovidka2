@extends('crozzmain')

@section('head')
    @include('crozzlayouts.head')
@endsection

@section('header')
    @include('crozzlayouts.header')
@endsection
@section('content')




    <div class="container-fluid content">
        <div class="alert alert-success" style="display:none">
            <ul></ul>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row m-0">
            <div class="col">
                <div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Редагування</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('descriptionupdate')}}" method="post">
                            @csrf
                                <input type="text" value="" id="id" name="id" class="d-none">
                            <div class="modal-body">

                                <div class="row mb-3">
                                    <label for="description" class="col-1 col-form-label">Звання</label>
                                    <div class="col-2">
                                        <input type="text" name="description" id="description" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" value="1" class="btn btn-outline-primary" name="Update">
                                    Оновити
                                </button>
                                <button type="submit" value="1" class="btn btn-danger" name="Delete">
                                    Видалити
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>



                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th scope="col">Званя</th>
                    </tr>
                    </thead>
                    <tbody class="row_position">
                    @foreach($description as $descriptions)
                        <tr class="forms all_of_stage" data-bs-toggle="modal" data-bs-target="#modal-create" id="{{$descriptions['id']}}">


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
                        <div class="alert alert-danger print-error-msg"  style="display:none">
                            <ul></ul>
                        </div>
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <div class="container">
                                        <div class="row pl-2 pt-3 mr-0">
                                            <div class="col mr-4">
                                                <div class="form-group row mb-2">
                                                    <label for="descriptionadd" class="col-sm-5">Звання</label>
                                                    <div class="col">
                                                        <input type="text" name="descriptionadd" class="form-control"
                                                               placeholder="Звання" id="descriptionadd">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="createadd" name="Create" class="btn btn-primary">Створити</button>
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
    <div class="d-flex">
        <div class="mx-auto">
            {{ $description->links( "pagination::bootstrap-4") }}
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
            $(function () {
                $('body').on('click', '.forms', function () {
                    let id = $(this).attr('id');
                    let ll = $(this).children('td').text();
                    $('#id').attr('value', id);
                    $('#description').attr('value', ll.trim());
                });
            });

            $('#createadd').on("click", function () {
                let descriptionadd = $('#descriptionadd').val();
                let urladd = "{{route('descriptionadd')}}";
                let _token = '{{ csrf_token() }}';
                $.ajax({
                    url: urladd,
                    type: "POST",
                    data: ({'_token': _token,
                        'descriptionadd':descriptionadd}),
                    dataType: "json",
                    success: function(data){
                        if($.isEmptyObject(data.error)){
                            alert(data.success);
                            location.reload();
                        }else{
                            printErrorMsg(data.error);
                        }

                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $( ".row_position" ).sortable({
            delay: 150,
            stop: function() {
                var selectedData = new Array();
                $('.row_position>tr').each(function() {
                    selectedData.push($(this).attr("id"));
                });

                updateOrder(selectedData);

            }
        });


        function updateOrder(data) {
            //alert(data);
            let urladd = "{{route('descriptionsorted')}}";
            let _token = '{{ csrf_token() }}';
            $.ajax({
                url:urladd,
                type:'post',
                data: ({'_token': _token,
                    position:data}),
                dataType: "json",
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                        location.reload();
                    }else{
                        printErrorMsg(data.error);
                    }

                }
            })
        }
    </script>
@endsection
