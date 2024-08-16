@foreach($value as $k => $v)
    <p class="leading-relaxed mb-3">
        <b>{{$k}}: </b>
        @if(!is_object($v) and !is_array($v)) 
            {{$v}} 
        @else
            <pre>
            {{ print_r($v, true) }}
            </pre>
        @endif
    </p>
@endforeach