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
                        <th scope="col">ФІО</th>
                        <th scope="col">ATC-2</th>
                        <th scope="col">ATC-2"0"</th>
                        <th scope="col">MATS</th>
                        <th scope="col">ATC-10</th>
                        <th scope="col">Категорія</th>
                        <th scope="col">Званя</th>
                        <th scope="col">Посада</th>
                        <th scope="col">Підрозділ</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr data-href="3" class="all_of_stage">
                        <td>Фалько Світлана Іванівна</td>
                        <td>23532555</td>
                        <td>не закріплений</td>
                        <td>не закріплений</td>
                        <td>не закріплений</td>
                        <td>абонент загальної черги</td>
                        <td>м-р м/с</td>
                        <td>Начальник групи</td>
                        <td>Група оборонних ресурсів. Командування Медичних сил ЗСУ</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-label="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Створити</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <input type="hidden" name="csrfmiddlewaretoken" value="7Ta8dF3jQCifs13Ayz2Mglc7DRkB2iaiyf7NFerHrao5XATqwFtoMWOas2k2Wsd0">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">

                                    <div class="container">
                                        <div class="row pl-2 pt-3 mr-0">
                                            <div class="col mr-4">
                                                <div class="form-group row mb-2">
                                                    <label for="FullName" class="col-sm-5">ПІП(Позивний):</label>
                                                    <div class="col">
                                                        <input type="text" name="FullName" class="form-control" placeholder="ПІП" id="FullName" minlength="7" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="City" class="col-sm-5">Адреса</label>
                                                    <div class="col">
                                                        <select name="City" class="form-select" placeholder="Адреса" id="City" required="">
                                                            <option value="" selected="selected">---------</option>

                                                            <option value="3">вулиця Госпітальна 16</option>

                                                            <option value="5">вулиця Різницька 13/15</option>

                                                            <option value="6">вулиця Шамрило 19</option>

                                                            <option value="7">вулиця Л.У.країнки 25</option>

                                                            <option value="8">в/м 113</option>

                                                            <option value="9">гітара</option>

                                                            <option value="10">вулиця Фучика 5</option>

                                                            <option value="11">вулиця Грушевського 12/2</option>

                                                            <option value="12">вулиця Фучіка 5</option>

                                                            <option value="13">Будинок офіцерів, Грушевського, 30/1</option>

                                                            <option value="14">Тарасівська 7</option>

                                                            <option value="15">вул. Фучіка, 5а 'Трудовий'</option>

                                                            <option value="16">гуртожиток ПВО буд. 107 к.5.</option>

                                                            <option value="17">вулиця Грушевського 30/1</option>

                                                            <option value="18">114</option>

                                                            <option value="19">вулиця Московська 45/1</option>

                                                            <option value="20">вулиця Мельникова 81 в</option>

                                                            <option value="21">вулиця Фучика 5а</option>

                                                            <option value="22">в/м 63</option>

                                                            <option value="24">Гітара 114</option>

                                                            <option value="25">вулиця Мельникова 24</option>

                                                            <option value="26">Святошино</option>

                                                            <option value="27">вулиця Московська 5/2</option>

                                                            <option value="28">Двір ПВО</option>

                                                            <option value="29">вулиця Стадіонна 6</option>

                                                            <option value="30">в/м 127</option>

                                                            <option value="31">вулиця Госпітальна 18</option>

                                                            <option value="32">'Гітара'</option>

                                                            <option value="33">вулиця Д.З.апольського 9 кв. 27</option>

                                                            <option value="34">вулиця Фучіка 7</option>

                                                            <option value="36">вулиця Народного ополчення 5а</option>

                                                            <option value="38">вулиця Каменева 8</option>

                                                            <option value="39">Діяльний</option>

                                                            <option value="40">в/м 110</option>

                                                            <option value="41">вулиця Електриків 33</option>

                                                            <option value="42">вулиця Народного ополчення 3</option>

                                                            <option value="43">вулиця Артема 59</option>

                                                            <option value="44">вулиця Володимирська 33</option>

                                                            <option value="45">вул. Грушевського 30/1</option>

                                                            <option value="46">вулиця Лесі Українки 25</option>

                                                            <option value="47">вулиця Дегтярівська 18/24</option>

                                                            <option value="48">вулиця Грушевськог 30/1 ,4-йповерх</option>

                                                            <option value="50">218 з-п</option>

                                                            <option value="51">вулиця Тарасовська 7а</option>

                                                            <option value="52">вулиця Магнітогорська 5</option>

                                                            <option value="53">вилиця Тарасовська 7а</option>

                                                            <option value="54">Тайфун</option>

                                                            <option value="55">Конго</option>

                                                            <option value="56">в. Тарасовська 7а</option>

                                                            <option value="57">вул. Кутузова, 14</option>

                                                            <option value="58">вулиця Андрющенко 6</option>

                                                            <option value="59">Вишенки</option>

                                                            <option value="60">вулиця Московська, 5/2</option>

                                                            <option value="61">'Тайфун'</option>

                                                            <option value="62">вулиця Лисенко 6</option>

                                                            <option value="63">'Гитара'114обєкт</option>

                                                            <option value="64">193</option>

                                                            <option value="65">вулиця Народного ополчення 5</option>

                                                            <option value="66">вулиця Січових стрільців (Артема) 59</option>

                                                            <option value="68">'Гітара'в/ч А 3620</option>

                                                            <option value="69">в/ч А 3367</option>

                                                            <option value="71">в/м 31</option>

                                                            <option value="72">в/м 95</option>

                                                            <option value="73">в/м 116/20</option>

                                                            <option value="74">в/м 27</option>

                                                            <option value="75">в/м 115</option>

                                                            <option value="76">Будинок офіцерів, вул. Грушевського, 30/1</option>

                                                            <option value="77">в/м 64</option>

                                                            <option value="79">пр. Лесі Українки</option>

                                                            <option value="82">пр. Лесі. Українки 25/1</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="Rank" class="col-sm-5">Звання:</label>
                                                    <div class="col">
                                                        <select name="Rank" class="form-select" id="Rank" required="">
                                                            <option value="" selected="selected">---------</option>

                                                            <option value="37">Адмірал</option>

                                                            <option value="48">Бр. ген</option>

                                                            <option value="23">Вільний</option>

                                                            <option value="27">Віце-адмірал</option>

                                                            <option value="22">Вакант</option>

                                                            <option value="1">ген. армії України</option>

                                                            <option value="3">ген. л-т</option>

                                                            <option value="4">ген. м-р</option>

                                                            <option value="41">ген. м-р м/с</option>

                                                            <option value="2">ген. п-к</option>

                                                            <option value="55">головний майстер-сержант</option>

                                                            <option value="51">Головний сержант</option>

                                                            <option value="40">держ. сл</option>

                                                            <option value="46">Державний радник юстиції 3 класу</option>

                                                            <option value="44">Державний службовець</option>

                                                            <option value="26">До уточнення</option>

                                                            <option value="8">к-н</option>

                                                            <option value="45">к-н м/сл</option>

                                                            <option value="49">к-н юст</option>

                                                            <option value="28">капітан 1рангу</option>

                                                            <option value="30">капітан 2 рангу</option>

                                                            <option value="33">Контр-адмірал</option>

                                                            <option value="10">л-т</option>

                                                            <option value="7">м-р</option>

                                                            <option value="36">м-р м/с</option>

                                                            <option value="50">м-р м/сл</option>

                                                            <option value="38">м-р юстиції</option>

                                                            <option value="56">Майстер-сержант</option>

                                                            <option value="11">мол. л-т</option>

                                                            <option value="17">мол. с-нт</option>

                                                            <option value="5">п-к</option>

                                                            <option value="31">п-к м/с</option>

                                                            <option value="34">п-к юстиції</option>

                                                            <option value="6">п/п-к</option>

                                                            <option value="35">п/п-к м/с</option>

                                                            <option value="32">п/п-к юстиції</option>

                                                            <option value="20">пр. ЗСУ</option>

                                                            <option value="13">Прапорщик</option>

                                                            <option value="47">Працівник</option>

                                                            <option value="16">с-нт</option>

                                                            <option value="57">Сержант</option>

                                                            <option value="19">солд</option>

                                                            <option value="14">ст-на</option>

                                                            <option value="9">ст. л-т</option>

                                                            <option value="29">ст. мічман</option>

                                                            <option value="12">ст. п-к</option>

                                                            <option value="39">ст. пр-к</option>

                                                            <option value="15">ст. с-нт</option>

                                                            <option value="18">ст. солд</option>

                                                            <option value="53">ст.с-т</option>

                                                            <option value="52">Старший майстр-сержант</option>

                                                            <option value="43">Старшина</option>

                                                            <option value="21">Чергова зміна</option>

                                                            <option value="24">Черговий варти</option>

                                                            <option value="25">Черговий офіцер</option>

                                                            <option value="54">Штаб-сержант</option>

                                                            <option value="42">Штаб-сержант 2 категорії</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="Position" class="col-sm-5">Посада:</label>
                                                    <div class="col">
                                                        <textarea name="Position" cols="40" rows="2" class="form-control" id="Position" placeholder="Посада" data-bs-toggle="modal" data-bs-target="#search_category" minlength="8" required=""></textarea>
                                                        <div id="search_position" class="search_cat_1">
                                                            <input type="text" id="Position_search" style="width:100%;" placeholder="Пошук">
                                                            <div id="append_position"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="Unit" class="col-sm-5">Підрозділ:</label>
                                                    <div class="col">
                                                        <textarea name="Unit" cols="40" rows="3" class="form-control" id="Unit" data-bs-toggle="modal" data-bs-target="#search_category" required=""></textarea>
                                                        <div id="search_unit" class="search_cat_1">
                                                            <input type="text" id="Unit_search" style="width:100%;" placeholder="Пошук">
                                                            <div id="append_unit"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="Category" class="col-sm-5">Категорія:</label>
                                                    <div class="col">
                                                        <select name="Category" class="form-select" id="Category" required="">
                                                            <option value="" selected="selected">---------</option>

                                                            <option value="7">*</option>

                                                            <option value="3">абонент другої черги</option>

                                                            <option value="4">абонент загальної черги</option>

                                                            <option value="2">абонент першої черги</option>

                                                            <option value="6">вільний</option>

                                                            <option value="5">вакант</option>

                                                            <option value="1">позачерговий абонент</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group row mb-2">
                                                    <label for="Cabinet" class="col-sm-5">Кабінет:</label>
                                                    <div class="col">
                                                        <input type="text" name="Cabinet" class="form-control" placeholder="Кабінет" id="Cabinet" data-bs-toggle="modal" data-bs-target="#search_category" required="">
                                                        <div id="search_cabinet" class="search_cat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="Build" class="col-sm-5">Будівля:</label>
                                                    <div class="col">
                                                        <input type="text" name="Build" class="form-control" placeholder="Будівля" id="Build" required="">
                                                        <div id="search_build" class="search_cat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="ATC-2" class="col-sm-5">ATC-2:</label>
                                                    <div class="col">
                                                        <input type="text" name="Atc2" class="form-control" placeholder="ATC-2" id="ATC-2">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="ATC-2(0)" class="col-sm-5">ATC-2(0):</label>
                                                    <div class="col">
                                                        <input type="text" name="Atc20" class="form-control" placeholder="ATC-2(0)" id="ATC-2(0)">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="Mats" class="col-sm-5">MATS:</label>
                                                    <div class="col">
                                                        <input type="text" name="Mats" class="form-control" placeholder="MATS" id="Mats">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label for="ATC-10" class="col-sm-5">ATC-10:</label>
                                                    <div class="col">
                                                        <input type="text" name="Atc10" class="form-control" placeholder="ATC-10" id="ATC-10">
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
                    <button type="button" class="btn-close btn-closes" data-bs-dismiss="modal" aria-label="Close"></button>
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

            </li><li class="page-item">

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
