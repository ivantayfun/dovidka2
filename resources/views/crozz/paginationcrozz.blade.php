
@foreach($company as $datas)
    <tr class="forms all_of_stage" data-bs-toggle="modal" data-bs-target="#modal-create">
        {{--id="{{$datas['cn'][0]}}">

        --}}{{--ФІО--}}
        <td id="tdsn">@if(isset($datas))
                {{$datas['company']}}
            @else -
            @endif</td>
        {{--АТС-2--}}{{--
        --}}{{--homephone--}}{{--
        <td id="tdhomephone">@if(isset($datas['homephone'][0]))
                {{$datas['homephone'][0]}}
            @else -
            @endif
        </td>
        --}}{{--ЗСУ-002--}}{{--
        --}}{{--cn--}}{{--
        <td id="tdcn">@if(isset($datas['cn'][0]))
                {{$datas['cn'][0]}}
            @else -
            @endif
        </td>
        --}}{{--Званя--}}{{--
        --}}{{--description--}}{{--
        <td id="tddescription">@if(isset($datas['description'][0]))
                {{$datas['description'][0]}}
            @else -
            @endif
        </td>
        --}}{{--Посада--}}{{--
        --}}{{--title--}}{{--
        <td id="tdtitle">@if(isset($datas['title'][0]))
                {{$datas['title'][0]}}
            @else -
            @endif
        </td>
        --}}{{--Підрозділ--}}{{--
        <td  id="tddepartment">@if(isset($datas['department'][0]))
                {{$datas['department'][0]}}
            @else -
            @endif
        </td>
        --}}{{--Військова частина--}}{{--
        --}}{{--company--}}{{--
        <td id="tdcompany">@if(isset($datas['company'][0]))
                {{$datas['company'][0]}}
            @else -
            @endif
        </td>

        --}}{{--Приміщення--}}{{--
        --}}{{--physicalDeliveryOfficeName--}}{{--


        --}}{{--Кабінет--}}{{--
        --}}{{--physicalDeliveryOfficeName--}}{{--
        <td id="tdphysicaldeliveryofficename">@if(isset($datas['physicaldeliveryofficename'][0]))
                {{$datas['physicaldeliveryofficename'][0]}}
            @else -
            @endif
        </td>
        --}}{{--Будівля--}}{{--
        --}}{{--postOfficeBox--}}{{--
        <td id="tdpostofficebox">@if(isset($datas['postofficebox'][0]))
                {{$datas['postofficebox'][0]}}
            @else -
            @endif
        </td>
--}}
    </tr>
@endforeach
<tr>

{{--<td colspan="9" >

    <div class="d-flex">
        <div class="mx-auto">
            {{ $contact->links( "pagination::bootstrap-4") }}
        </div>
    </div>

</td>--}}



</tr>
{{--<div class="d-flex">
    <div class="mx-auto">
        {{ $contact->links( "pagination::bootstrap-4") }}
    </div>
</div>--}}
