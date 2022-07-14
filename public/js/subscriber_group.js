$(function () {
    let timerId;
    $('#search_abonent').on('input', function () {
        clearTimeout(timerId);
        let val = $(this).val();
        timerId = setTimeout(function () {
            $.ajax({
                type: "POST",
                url: "/subscriber_group/search/",
                data: {
                    'value': val,
                    'location': window.location.href,
                    csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
                },
                dataType: 'html',
                success: function (result) {
                    $('tbody').html(result);
                },
            });
        }, 1000);
    });

    $('body').on('click', '.forms', function () {
        let id = $(this).attr('id');
        let ll = $(this).children('td').html();
        $("#id").attr('value',id);
        $("#company").attr('value',ll)
        .ajax({
            type: "POST",
            url: 'company',
            data: {
                'id': id,
                'value': ll
            },
            dataType: 'JSON',
            success: function (result) {
                const arr = JSON.parse(result);
                console.log(result);
                /*if (arr.Leters) {
                    $('#Leters').val(arr.Leters);
                } else if (arr.Build) {
                    $('#Build').val(arr.Build);
                } else if (arr.Category) {
                    $('#Mats_category').val(arr.Category);
                }
                $('#Value').val(arr.Value);
                $('#id').val(arr.id);*/
            }
        });
    });
    let location;
    $('#Position, #Unit, #Cabinet, #Build').on('click', function (e) {
        if ($(e.target).is('#Position')) {
            location = 'position';
        } else if ($(e.target).is('#Unit')) {
            location = 'unit';
        } else if ($(e.target).is('#Cabinet')) {
            location = 'cabinet';
        }
        $('body').off('click', '.get_text td');
        $('body').on('click', '.get_text td', function () {
            if(location == 'cabinet'){
                var build = $(this).next().text();
                $('#Build').val(build);
            }
            $(`#${e.target.id}`).val('').val($(this).text());
            $('#search').val('');
            $('.btn-closes').trigger('click');
            $('#append_content').html('');
        });
        $('.btn-closes').on('click', function () {
            $('#append_content').html('');
            $('#search').val('');
        });
        $('#ok_category').off('click');
        $('#ok_category').on('click', function () {
            var value = $('#search');
            $(e.target).val(value.val());
            value.val('');
            $('.btn-closes').trigger('click');
            $('#append_content').html('');
        });
    });
    $('#search').on('input', function () {
            let value = $(this).val();
            $.ajax({
                type: "POST",
                url: "/subscriber_group/",
                data: {
                    'value': value,
                    'location': location,
                    csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
                },
                dataType: 'html',
                success: function (result) {
                    $('#append_content').html(result);
                }
            });
        });
});
document.ready(function() {
    $('#createadd').on("click",function(){
        $("#companyadd").attr('value', 'fff');
        /*$.ajax({
            url: "{ route('submit2') }}",
            type: 'POST',
            data: ({
                number: 5
            }),
            dataType: "html",
            beforeSend: funcBefore,
            success: function(data){
                $('#companyadd').attr('value', 'ooo')
                /!*$.each(data.errors, function(key, value){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<p>'+value+'</p>');
                });*!/
            }

        });*/

    });

});
