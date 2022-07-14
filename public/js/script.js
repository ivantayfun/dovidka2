// Toasts = function(id, name, surname, middleName, time){
//     $('.toast .toast-header small').text("№ " + id);
//     $('.toast .toast-body h5').text(surname + " " + name + " " + middleName);
//     $('.toast .toast-body small').text("Дата створення: " + time);
//     $('.toast').toast('show');
// }
// onload = function (){
//     setTimeout (function(){
//         onload()
//         let id;
//         var a = document.querySelector('tbody tr#test:last-child td a');

//         if(a){
//             id = a.id;
//             $.ajax({
//                 type: "GET",
//                 url: "/tech_support/",
//                 data: {'id': id},
//                 dataType: 'html',
//                 success: function(result){
//                     if(result == "query not found"){

//                     }
//                     else{
//                         const arre = JSON.parse(result)
//                         var ver;
//                         if(arre.Verified){
//                             ver = "Так"
//                         }
//                         else{
//                             ver = "Ні"
//                         }
//                         var html = '<tr class="text-center" id="test">\
//                         <td><a href="" class="shows" id ="' + String(arre.id) + '" data-toggle="modal" data-target="#Tickets"><i class="fas fa-align-justify"></i></a></td>\
//                         <td>' + arre.Problem + '</td>\
//                         <td>' + arre.DateTimeCreate + '</td>\
//                         <td>' + arre.DateTimeView + '</td>\
//                         <td>' + arre.DateTimeClosing + '</td>\
//                         <td>' + ver +'</td>\
//                         <td>' + arre.Service + '</td>\
//                         <td>' + arre.Executor + '</td>\
//                         <td>' + arre.Group + '</td>\
//                         </tr>';
//                         $('tbody').append(html);
//                         Toasts(arre.id, arre.Name, arre.Surname, arre.MiddleName, arre.DateTimeCreate)


//                     }
//                 }
//             });
//         }
//         else{
//             onload()
//         }
//     }, 120000);
// }

$(window).on('load', function () {
    $('.preloader').delay(500).fadeToggle(500);
});
var time = new Date().getTime();
$(document.body).bind("mousemove keypress", function () {
    time = new Date().getTime();
});

function refresh() {
    if (window.location.href.indexOf('dovidka') > 0 || window.location.href.indexOf('subscriber_group') > 0 || window.location.href.indexOf('tech_support') > 0)  {

    } else {
        if (new Date().getTime() - time >= 60000)
            window.location.reload(true);
        else
            setTimeout(refresh, 10000);
    }
}
setTimeout(refresh, 10000);
$('body').on("click",'tr[data-href]' ,function () {
    document.location = $(this).data('href');
});

//создание заявки
// $('#create').on('click', function(){
//     var Problem = $('#CreateProblemDescription').val();
//     var ContactPerson = $('#CreatContactPerson').val();
//     var Service = $('#CreateService').val();
//     var Group = $('#CreateGroup').val();
//     var NumberATC = $('#CreateNumberATC').val();

//      $.ajax({
//         type: "POST",
//         url: "/tech_support/",
//         data: {
//             'Problem' : Problem,
//             'ContactPerson': ContactPerson,
//             'Service': Service,
//             'Group': Group,
//             'NumberATC': NumberATC,
//             csrfmiddlewaretoken:$('input[name=csrfmiddlewaretoken]').val()
//         },
//         dataType: 'html',
//         success: function(result){
//             if(result == "ok")
//             {
//                 location.reload();
//                 $('#CreateProblemDescription').val("");
//                 $('#CreatContactPerson').val("");
//                 $('#CreateGroup option:first, #CreateService option:first').prop('selected', true);
//                 $('#CreateNumberATC').val("");
//             }
//         }
//     });
// });
//детальный просмотр заявки
// $('body').on('click', '.shows', function () {
//     var id = $(this).attr("id");
//     $('#VerifiedError').removeAttr('style');
//     $.ajax({
//         type: "GET",
//         url: "/tech_support/search",
//         data: {
//             "id": id
//             // csrfmiddlewaretoken:$('input[name=csrfmiddlewaretoken]').val()
//         },
//         dataType: 'html',
//         success: function (result) {
//             const arr = JSON.parse(result);
//             $("#Request").text("Заявка № " + arr.id);
//             $("#id").val(arr.id);
//             $("#idtickets").val(arr.id);
//             $("#ProblemDescription").val(arr.Problem);
//             $("#ContactPerson").val(arr.ContactPerson);
//             $("#Cabinet").val(arr.Cabinet);
//             $("#Build").val(arr.Build);
//             $("#NumberATC").val(arr.ProblemNumber);
//             $("#Group_inf").text(arr.Group);
//             $("#Surname").val(arr.FullName);
//             $("#Address").val(arr.City);
//             $("#Position").val(arr.Position);
//             $("#Unit").val(arr.Unit);
//             $("#Category").val(arr.Category);
//             $("#Rank").val(arr.Rank);
//             $("#CreateDateTime").val(arr.DateTimeCreate);
//             $("#DateTimeViewTickets").val(arr.DateTimeView);
//             if (arr.Verified == true) {
//                 $("#Verified").prop('checked', true).attr('disabled', 'disabled');
//                 $('.Verified').css('display', 'none');
//                 $('#ProblemDescription').attr('readonly', 'readonly');
//                 $('#ContactPerson').attr('readonly', 'readonly');
//             } else {
//                 $("#Verified").prop('checked', false).removeAttr('disabled');
//                 $('.Verified').css('display', 'inline-block');
//             }
//             $("#ClosingDate").val(arr.DateTimeClosing);
//             $("#RobotsExecuted").val(arr.ExecutorService);
//             $("#RankExecutor").val(arr.ExecutorRank);
//             $("#Executor").val(arr.Executor);
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             console.log(textStatus, errorThrown);
//         }
//     });
// });
// $('body').on('click', '.show', async function() {
//     var id = $(this).attr("id");
//     $('#VerifiedError').removeAttr('style');
//     console.log(id);
//     const res = await fetch(`/tech_support/search?id=${id}`);
//    if (!res.ok) {
//      alert('ошибка...');
//     } else {
//        console.log('запрос отправлен успешно');
//      const json = await res.json();
//        console.log(json);
//     }
// });

// $('.close').on('click', function () {
//     $("#Request").text("Заявка № ");
//     $("#Created").text("");
//     $("#ProblemDescription").val("");
//     $("#ContactPerson").val("");
//     $("#Cabinet").val("");
//     $("#NumberATC").val("");
//     $("#Group_inf").text("");
//     $("#Surname").val("");
//     $("#Name").val("");
//     $("#LastName").val("");
//     $("#Address").val("");
//     $("#Position").val("");
//     $("#Unit").val("");
//     $("#Category").val("");
//     $("#Rank").val("");
//     $("#CreateDateTime").val("");
//     $("#Verified").prop('checked', false);
//     $('#Executor').val("");
//     $('#RankExecutor').val("");
//     $('#RobotsExecuted').val("");
//     $("#ClosingDate").val("");
//     $("#DateTimeViewTickets").val("");
//     $("#CreateNumberATC").val("");
//     $("#search-results").val("");
//     $("#CreateProblemDescription").val("");
//     $("#CreatContactPerson").val("");
//     $("#CreateGroup option:first").prop('selected', true);
//     $("#CreateService option:first").prop('selected', true);
//     $("#Executor option:first").prop('selected', true);
//     $('#Atc2').val("");
//     $('#Atc20').val("");
//     $('#Mats').val("");
//     $('#Atc10').val("");
//
//
// });


// $('.CloseTickets').on('click', function(){
//     let id = $("#id").val();
//     let Executor = $('#Executor').val();
//     let sel = $('#Executor option:selected').text()
//     let RobotsExecuted = $('#RobotsExecuted').val();
//     if(sel == "-----------"){
//         $('#Executor').addClass('error');
//         return true;
//     }
//     else{
//         $('#Executor').removeClass('error');
//     }
//     if(RobotsExecuted == ''){
//         $('#RobotsExecuted').addClass('error');
//         return true;
//     }
//     else{
//         $('#RobotsExecuted').removeClass('error');
//     }
//     // $.ajax({
//     //     type: "POST",
//     //     url: "/kross/sec",
//     //     data: {
//     //         "id":id,
//     //         "Executor": Executor,
//     //         "RobotsExecuted": RobotsExecuted,
//     //         csrfmiddlewaretoken:$('input[name=csrfmiddlewaretoken]').val()
//     //     },
//     //     dataType: 'html',
//     //     success: function(result){
//     //             if (result == 'ok'){
//     //                 $('.close').trigger('click');
//     //                 location.reload();
//     //             }
//     //     }
//     // });
// });

// $('.Verified').on('click', function () {
//     var id = $("#id").val();
//     var name = $(this).attr('name');
//     if (name == "Update") {
//         data = {
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val(),
//             'id': id,
//             'ContactPerson': $('#ContactPerson').val(),
//             'ProblemDescription': $('#ProblemDescription').val(),
//             'Click': 'Update'
//         }
//         ajax(data);
//         data = {}
//     } else {
//         if ($("#Verified").prop('checked')) {
//             if ($('#Executor').val() == '') {
//                 alert("Заяка ще не виконано");
//                 return true;
//             } else {
//                 data = {
//                     csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val(),
//                     'id': id,
//                     'Click': 'Close'
//                 }
//                 ajax(data);
//                 data = {}
//             }
//         } else {
//             $('#VerifiedError').css('color', 'red');
//         }
//     }
//
//     function ajax(data) {
//         $.ajax({
//             type: "POST",
//             url: "/tech_support/seccsess",
//             data: data,
//             dataType: 'html',
//             success: function (result) {
//                 if (result == 'ok') {
//                     $('.close').trigger('click');
//                     location.reload();
//                 }
//             }
//         });
//     }
// });

// $('.tick').on('click', function () {
//     var id = $(this).attr("id");
//     $("#DateTimeViewTickets").val();
//     $.ajax({
//         type: "POST",
//         url: "/kross/",
//         data: {
//             "id": id,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         },
//         dataType: 'html',
//         success: function (result) {
//             const arr = JSON.parse(result);
//             if (arr.ok == 'ok') {
//                 console.log(arr.UserName)
//             } else {
//
//                 $("#DateTimeViewTickets #TimeView").val(arr.DateTimeView);
//
//             }
//
//         }
//     });
// });
let id = "";
let fun = "";
$('body').on('click', '.phone', function () {
    id = $(this).attr("id");
    fun = $(this).attr("title");
    let ip = $('.ip').text();
    if (fun == 'reboot') {
        $('.showquery .modal-body').html("Перезавантажити телефон " + ip + " ?");
    } else if (fun == 'update') {
        $('.showquery .modal-body').html("Оновити телефон " + ip + " ?");
    } else if (fun == 'reset') {
        $('.showquery .modal-body').html("Скинути налаштування телефона " + ip + " ?");
    }
});

function test(id, fun) {
    $.ajax({
        type: "POST",
        url: "/voa/",
        data: {
            "id": id,
            "fun": fun,
            csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
        },
        dataType: 'html',
        success: function (result) {
            $('.toast-body').html(result);
            $('.toast').toast('show');
        }
    });
}

$('.goo').on('click', function () {
    test(id, fun)
    $(".modal").modal("hide");
});

// $("#search_FullName").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//
//     $("table tbody tr").each(function(index) {
//         if (index !== 0) {
//             var id = $(this).children().text().toLowerCase();
//             if (id.indexOf(value) < 0) {
//                $(this).hide();
//             }else {
//                 $(this).show();
//             }
//         }
//     });
// });

const addArrayToTable = (jsonString) => {
    const peopleArray = JSON.parse(jsonString); // JSON в JS объект
    const tableBody = document.querySelector('table tbody'); // ищем тело таблицы в которую вставлять
    for (const person of peopleArray) { // цикл по всем людям в массиве
        const tr = document.createElement('tr'); // создаем элемент tr
        for (const value of Object.values(person)) { // цикл по каждому значению в объекте человека
            const td = document.createElement('td'); // создаем элемент td
            td.textContent = value; // заносим в него значение
            tr.appendChild(td);// добавляем td в tr
            tr.classList.add('newtr');
        }
        tableBody.appendChild(tr); // добавляем tr в тело таблицы
    }
};
// let html = $('table tbody').html();
// $("#dovidka_search").on('input', function () {
//     let FullName = $('#searchD_FullName');
//     let Number = $('#number');
//     let Cabinet = $('#searchD_cabinet');
//     let Position = $('#searchD_position');
//     let Unit = $('#searchD_unit');
//     let City = $('#searchD_city');
//     $.ajax({
//         type: "POST",
//         url: "/dovidka/",
//         data: {
//             'FullName': FullName.val(),
//             'number': Number.val(),
//             'Cabinet': Cabinet.val(),
//             'Position': Position.val(),
//             'Unit': Unit.val(),
//             'City': City.val(),
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         },
//         dataType: 'html',
//         success: function (result) {
//             if (FullName.val() != "" || Cabinet.val() != "" || Number.val() != "" || Position.val() != "" || Unit.val() != "" || City.val() != "") {
//                 document.querySelector('table tbody').innerHTML = '';
//                 addArrayToTable(result);
//             } else {
//                 document.querySelector('table tbody').innerHTML = '';
//                 $(html).appendTo('table tbody');
//             }
//         }
//     });
//
// });
function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}
function printSuccessMsg (msg) {
    $('.modal').modal('hide');
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','none');
    $(".alert-success").find("ul").html(msg);
    $(".alert-success").css('display','block');
}
$(document).ready(function () {
    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.category').animate({left: '-100%'}, 1000).attr('aria-expanded', 'false')
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

$('#DropMenu').on('click', function () {
    if ($(this).attr('aria-expanded') == "false") {
        $(this).attr('aria-expanded', 'true')
        $("#DropPage").slideDown("slow");
        $('.fa-arrow-circle-up').css('transform', 'rotate(360deg)');
    } else {
        $('.fa-arrow-circle-up').removeClass('arrowrotate');
        $("#DropPage").slideUp("slow");
        $('.fa-arrow-circle-up').css('transform', 'rotate(180deg)');
        $(this).attr('aria-expanded', 'false')

    }

});

$('.components a').on('click', function (e) {
    // e.preventDefault();
    let data = {}
    if ($('#sidebar').hasClass('active') == true) {
        if ($(this).attr('href') == 'unit') {
            if ($('.category').attr('aria-expanded') == "false") {
                $('.category #unit').animate({left: '250px'}, 1000).attr('aria-expanded', 'true');
            } else {
                $('.category').animate({left: '-100%'}, 1000).attr('aria-expanded', 'false');
            }
        } else if ($(this).attr('href') == 'position') {
            if ($('.category').attr('aria-expanded') == "false") {
                $('.category #position').animate({left: '250px'}, 1000).attr('aria-expanded', 'true');
            } else {
                $('.category').animate({left: '-100%'}, 1000).attr('aria-expanded', 'false');
            }
        }
    } else {
        $('.category').animate({left: '-100%'}, 1000).attr('aria-expanded', 'false');
    }
});


// $(function (){
//     $(document).click(function (e) {
//         let timerId;
//         if ($(e.target).closest('#Unit, #Unit_search').length) {
//             clearTimeout(timerId);
//             $('#search_unit').slideDown();
//             $('#Unit_search').on('input', function () {
//                 let unit = $('#Unit_search').val();
//                 if (unit == "") {
//                     return true
//                 }
//                 if (window.location.href.indexOf('subscriber_group') > 0) {
//                     timerId = setTimeout(function () {
//                         $.ajax({
//                             type: "POST",
//                             url: "/subscriber_group/search/",
//                             data: {
//                                 'unit': unit,
//                                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//                             },
//                             dataType: 'html',
//                             success: function (result) {
//                                 $('#append_unit').html('');
//                                 const res = JSON.parse(result);
//                                 let span;
//                                 for (const a of res) {
//                                     for (const foo of Object.values(a)) {
//                                         span = $('<a href="#" class="d-block ml-2 addpostunit" style="color: black;">' + foo + '</a>');
//                                     }
//                                     span.appendTo('#append_unit');
//                                 }
//                             }
//                         });
//                     },1000);
//                 } else {
//                     let id = $('#id_id').val();
//                     $.ajax({
//                         type: "POST",
//                         url: "/subscriber_group/" + id,
//                         data: {
//                             'unit': unit,
//                             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//                         },
//                         dataType: 'html',
//                         success: function (result) {
//                             $('#search_unit').text('');
//                             const res = JSON.parse(result);
//                             let span;
//                             for (const a of res) {
//                                 for (const foo of Object.values(a)) {
//                                     span = $('<a href="#" class="d-block ml-2 addpostunit" style="color: black;">' + foo + '</a>');
//                                 }
//                                 span.appendTo('#search_unit');
//                             }
//                         }
//                     });
//                 }
//
//             });
//             return;
//         }
//         $('#search_unit').slideUp();
//     });
// });
//
//     $(document).click(function (e) {
//     if ($(e.target).closest('#Cabinet, #search_cabinet').length) {
//         $('#search_cabinet').slideDown();
//         $('#Cabinet').on('input', function () {
//             let cabinet = $('#Cabinet').val();
//             if (cabinet == "") {
//                 $('#search_cabinet').text('');
//                 return true
//             }
//             if (window.location.href.indexOf('subscriber_group') > 0) {
//                 $.ajax({
//                     type: "POST",
//                     url: "/subscriber_group/search/",
//                     data: {
//                         'cabinet': cabinet,
//                         csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//                     },
//                     dataType: 'html',
//                     success: function (result) {
//                         $('#search_cabinet').text('');
//                         const res = JSON.parse(result);
//                         let span;
//                         for (const a of res) {
//                             span = $('<a href="#" class="d-block ml-2 addpostcabinet" style="color: black;" data-build="' + a.build + '">' + a.rooms + '</a>');
//                             span.appendTo('#search_cabinet');
//                         }
//                     }
//                 });
//             } else {
//                 let id = $('#id_id').val();
//                 $.ajax({
//                     type: "POST",
//                     url: "/subscriber_group/" + id,
//                     data: {
//                         'cabinet': cabinet,
//                         csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//                     },
//                     dataType: 'html',
//                     success: function (result) {
//                         $('#search_cabinet').text('');
//                         const res = JSON.parse(result);
//                         let span;
//                         for (const a of res) {
//                             span = $('<a href="#" class="d-block ml-2 addpostcabinet" style="color: black;" data-build="' + a.build + '">' + a.rooms + '</a>');
//                             span.appendTo('#search_cabinet');
//                         }
//                     }
//                 });
//             }
//         });
//         return;
//     }
//     $('#search_cabinet').slideUp();
// });
// $(document).click(function (e) {
//     if ($(e.target).closest('#Build, #search_build').length) {
//         $('#search_build').slideDown();
//         $('#Build').on('input', function () {
//             let build = $('#Build').val();
//             if (build == "") {
//                 $('#search_build').text('');
//                 return true
//             }
//             if (window.location.href.indexOf('subscriber_group') > 0) {
//                 $.ajax({
//                     type: "POST",
//                     url: "/subscriber_group/search/",
//                     data: {
//                         'build': build,
//                         csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//                     },
//                     dataType: 'html',
//                     success: function (result) {
//                         $('#search_unit').text('');
//                         const res = JSON.parse(result);
//                         let span;
//                         for (const a of res) {
//                             span = $('<a href="#" class="d-block ml-2 addpostbuild" style="color: black;" data-build="' + a.rooms + '">' + a.build + '</a>');
//                             span.appendTo('#search_build');
//                         }
//                     }
//                 });
//             } else {
//                 let id = $('#id_id').val();
//                 $.ajax({
//                     type: "POST",
//                     url: "/subscriber_group/search/" + id,
//                     data: {
//                         'build': build,
//                         csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//                     },
//                     dataType: 'html',
//                     success: function (result) {
//                         $('#search_build').text('');
//                         const res = JSON.parse(result);
//                         let span;
//                         for (const a of res) {
//                             span = $('<a href="#" class="d-block ml-2 addpostbuild" style="color: black;" data-build="' + a.rooms + '">' + a.build + '</a>');
//                             span.appendTo('#search_build');
//                         }
//                     }
//                 });
//             }
//         });
//         return;
//     }
//     $('#search_build').slideUp();
// });
// $(document).ready(function () {
//     $('body').on('click', '.addpostposition', function (e) {
//         e.preventDefault();
//         let text = $(this).text();
//         $('#Position').val("").val(text);
//         $('#search_position').slideUp();
//         $('#Position_search').val('');
//     });
// });
// $(document).ready(function () {
//     $('body').on('click', '.addpostunit', function (e) {
//         e.preventDefault();
//         let text = $(this).text();
//         $('#Unit').val("").val(text);
//         $('#search_unit').slideUp();
//         $('#Unit_search').val('');
//     });
// });
// $(document).ready(function () {
//     $('body').on('click', '.addpostcabinet', function (e) {
//         e.preventDefault();
//         let text = $(this).text();
//         let build = $(this).attr('data-build');
//         $('#Cabinet').val("").val(text);
//         $('#Build').val("").val(build);
//
//     });
// });
// $(document).ready(function () {
//     $('body').on('click', '.addpostbuild', function (e) {
//         e.preventDefault();
//         let text = $(this).text();
//         let cabinet = $(this).attr('data-build');
//         $('#Cabinet').val("").val(cabinet);
//         $('#Build').val("").val(text);
//     });
// });
//
// const addArrayToTableInput = (jsonString) => {
//     const peopleArray = JSON.parse(jsonString); // JSON в JS объект
//     const tableBody = document.querySelector('table tbody'); // ищем тело таблицы в которую вставлять
//     for (const person of peopleArray) { // цикл по всем людям в массиве
//         const tr = createForm(person.id, person.atc, person.atcname, person.category);
//         tableBody.appendChild(tr); // добавляем tr в тело таблицы
//     }
// };
// //
// const createForm = (id, atc, atcname, category) => {
//     const tr = document.createElement('tr');
//     tr.className = 'forms newtr';
//     tr.setAttribute('data-bs-toggle', 'modal');
//     tr.setAttribute('data-bs-target', '#modal-create');
//     tr.id = id;
//
//     const td1 = document.createElement('td');
//     td1.textContent = atc;
//     tr.appendChild(td1);
//     if(atcname == 'Mats'){
//         const td2 = document.createElement('td');
//         td2.textContent = category;
//         tr.appendChild(td2);
//     }
//     else if(atcname == 'cabinet'){
//         const td2 = document.createElement('td');
//         td2.textContent = category;
//         tr.appendChild(td2);
//     }
//     else if(atcname == 'Unit'){
//         const td2 = document.createElement('td');
//         td2.textContent = category;
//         tr.appendChild(td2);
//     }
//
//
//
//     return tr;
// }
//
// $('#search_abonent').on('input', function () {
//     let val = $(this).val();
//     if (!val) {
//         document.querySelector('table tbody').innerHTML = '';
//         $(html).appendTo('table tbody');
//     } else if (window.location.pathname === "/subscriber_group/atc-2") {
//         data = {
//             'url': 'subscriber_group/atc-2',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     } else if (window.location.pathname === "/subscriber_group/atc-20") {
//         data = {
//             'url': 'subscriber_group/atc-20',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     } else if (window.location.pathname === '/subscriber_group/mats') {
//         data = {
//             'url': 'subscriber_group/mats',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     } else if (window.location.pathname === "/subscriber_group/atc-10") {
//         data = {
//             'url': 'subscriber_group/atc-10',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     } else if (window.location.pathname === "/subscriber_group/") {
//         data = {
//             'url': 'subscriber_group',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     } else if (window.location.pathname === "/subscriber_group/builds-and-rooms") {
//         data = {
//             'url': 'subscriber_group/builds-and-rooms',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     }else if (window.location.pathname === "/subscriber_group/unit") {
//         data = {
//             'url': 'subscriber_group/unit',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     }else if (window.location.pathname === "/subscriber_group/rank") {
//         data = {
//             'url': 'subscriber_group/rank',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     }else if (window.location.pathname === "/subscriber_group/position") {
//         data = {
//             'url': 'subscriber_group/position',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     }else if (window.location.pathname === "/subscriber_group/category") {
//     } else if (window.location.pathname === "/subscriber_group/") {
//         data = {
//             'url': 'subscriber_group',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     }
//     $.ajax({
//         type: "POST",
//         url: "/subscriber_group/search/",
//         data: data,
//         dataType: 'html',
//         success: function (result) {
//             console.log(result);
//             if (val != "") {
//                 document.querySelector('table tbody').innerHTML = '';
//                 addArrayToTableInput(result);
//             } else {
//                 document.querySelector('table tbody').innerHTML = '';
//                 $(html).appendTo('table tbody');
//             }
//         }
//     });
// });
// const addArrayToTableInputSub = (jsonString) => {
//     const peopleArray = JSON.parse(jsonString); // JSON в JS объект
//     const tableBody = document.querySelector('table tbody'); // ищем тело таблицы в которую вставлять
//     for (const person of peopleArray) { // цикл по всем людям в массиве
//         const tr = createFormSub(person.id, person.FullName, person.atc2, person.atc20, person.mats, person.atc10, person.Category, person.Rank, person.Position, person.Unit);
//         tableBody.appendChild(tr); // добавляем tr в тело таблицы
//     }
// };
// const createFormSub = (id, FullName, atc2, atc20, mats, atc10, category, rank, position, unit) => {
//     const tr = document.createElement('tr');
//     tr.setAttribute('data-href', id);
//     const tdFullName = document.createElement('td');
//     tdFullName.textContent = FullName;
//     tr.appendChild(tdFullName);
//
//     const tdatc2 = document.createElement('td');
//     tdatc2.textContent = atc2;
//     tr.appendChild(tdatc2);
//
//     const tdatc20 = document.createElement('td');
//     tdatc20.textContent = atc20;
//     tr.appendChild(tdatc20);
//
//     const tdmats = document.createElement('td');
//     tdmats.textContent = mats;
//     tr.appendChild(tdmats);
//
//     const tdatc10 = document.createElement('td');
//     tdatc10.textContent = atc10;
//     tr.appendChild(tdatc10);
//
//     const tdcategory = document.createElement('td');
//     tdcategory.textContent = category;
//     tr.appendChild(tdcategory);
//
//     const tdrank = document.createElement('td');
//     tdrank.textContent = rank;
//     tr.appendChild(tdrank);
//
//     const tdposition = document.createElement('td');
//     tdposition.textContent = position;
//     tr.appendChild(tdposition);
//
//     const tdunit = document.createElement('td');
//     tdunit.textContent = unit;
//     tr.appendChild(tdunit);
//     return tr;
// }
// let timerId;
// $('#search_abonent_sub').on('input', function () {
//     clearTimeout(timerId);
//     let val = $(this).val();
//     if (window.location.pathname === "/subscriber_group/") {
//         data = {
//             'url': 'subscriber_group',
//             'value': val,
//             csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//         }
//     }
//     timerId = setTimeout(function () {
//         $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: data,
//             dataType: 'html',
//             success: function (result) {
//                 $('tbody').html(result);
//             },
//         });
//     }, 1000);
// });
// $('body').on('click', '.forms', function () {
//     let id = $(this).attr('id');
//     if (window.location.pathname === '/subscriber_group/mats') {
//         $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/mats',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Mats').val(arr.Mats);
//                 const select = document.getElementById('Mats_category');
//                 if (arr.category == '7') {
//                     select.options[0].selected = true;
//                 } else if (arr.category == '3') {
//                     select.options[1].selected = true;
//                 } else {
//                     select.options[2].selected = true;
//                 }
//                 $('#id').val(arr.id);
//             }
//         });
//     }
//     else if (window.location.pathname === '/subscriber_group/atc-2'){
//          $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/atc-2',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Atc2').val(arr.Atc2);
//                 $('#id').val(arr.id);
//             }
//         });
//     }
//     else if (window.location.pathname === '/subscriber_group/atc-20'){
//          $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/atc-20',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Atc20').val(arr.Atc20);
//                 $('#id').val(arr.id);
//             }
//         });
//     }
//     else if (window.location.pathname === '/subscriber_group/atc-10'){
//          $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/atc-10',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Atc10').val(arr.Atc10);
//                 $('#id').val(arr.id);
//             }
//         });
//     }
//     else if (window.location.pathname === '/subscriber_group/builds-and-rooms'){
//          $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/builds-and-rooms',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Rooms').val(arr.Cabinet);
//                 $('#Build').val(arr.Build);
//                 $('#id').val(arr.id);
//             }
//         });
//     }
//     else if (window.location.pathname === '/subscriber_group/unit'){
//          $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/unit',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Unit').val(arr.Unit);
//                 $('#Leters').val(arr.Leters);
//                 $('#id').val(arr.id);
//             }
//         });
//     }
//     else if (window.location.pathname === '/subscriber_group/rank'){
//          $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/rank',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Rank').val(arr.Rank);
//                 $('#id').val(arr.id);
//             }
//         });
//     }
//     else if (window.location.pathname === '/subscriber_group/position'){
//          $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/position',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Position').val(arr.Position);
//                 $('#id').val(arr.id);
//             }
//         });
//     }
//     else if (window.location.pathname === '/subscriber_group/category'){
//          $.ajax({
//             type: "POST",
//             url: "/subscriber_group/search/",
//             data: {
//                 'id': id,
//                 'url': 'subscriber_group/category',
//                 'update': 'update',
//                 csrfmiddlewaretoken: $('input[name=csrfmiddlewaretoken]').val()
//             },
//             dataType: 'html',
//             success: function (result) {
//                 const arr = JSON.parse(result);
//                 $('#Category').val(arr.Category);
//                 $('#id').val(arr.id);
//             }
//         });
//     }
// });
