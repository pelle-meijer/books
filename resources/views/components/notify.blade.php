<div>
<script src="{{ asset('js/notification.js')}}"></script>
    @if(session('auth-error'))
    <script>notify({!! json_encode(session('auth-error')) !!})</script>
    @endif
    {{session(['auth-error' => null])}}
</div>