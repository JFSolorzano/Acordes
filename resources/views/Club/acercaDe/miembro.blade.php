<div class = "member" >
    <div class = "member-info clearfix" >
        <figure class = "member-thumb" >
            <img src = "{{ asset('club/img/team/member1-thumb.png') }}" alt = "{{ $empleado->nombres }}" >
        </figure >
        <h3 >{{ $empleado->nombres }}</h3 >
        {{--@foreach($empleado->Cargos as $cargo)--}}
            {{--<p class = "member-post" >{{ $cargo-> nombre }}</p >--}}
        {{--@endforeach--}}
    </div >
    <!-- /member-info -->
    <div class = "member-bio" >
        <p class = "italic text-justify elipsis" >{{ $empleado->biografia }}</p >
    </div >
    <!-- /member-bio -->
</div ><!-- /member -->