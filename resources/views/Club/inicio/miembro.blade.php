<div class="member">
    <div class="member-info clearfix">
        <figure class="member-thumb">
            <img src="{{ asset('club/img/team/member1-thumb.png') }}" alt="{{ $empleado->nombres }}">
        </figure>
        <h3>{{ $empleado->nombres }}</h3>
        <p class="member-post">{{ $empleado->nombre }}</p>
    </div><!-- /member-info -->
    <div class="member-bio">
        <p class="italic">{{ $empleado->biografia }}</p>
    </div><!-- /member-bio -->
</div><!-- /member -->