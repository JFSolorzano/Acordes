Haz click en el siguiente enlace para restablecer tu contrasena:
<br >
@if(Auth::user()->type == 0)

@elseif(Auth::user()->type == 1)
    {{ route('clubPostRestablecer',['token' => $token]) }}
@endif
