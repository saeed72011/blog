{{--<x-elements.modal idModal="{{$id ?? $param.$value}}" :title="$title" :size="$size ?? 'lg'">--}}
{{--    <livewire:{{$livewire}} {{$param}}="{{$value}}" />--}}
{{--    @livewire($livewire, [$param => $value],  key($id ?? $value))--}}
{{--</x-elements.modal>--}}


<button class="badge badge-info" onclick='Livewire.emit("openModal", "{!! $livewire !!}", {{ json_encode([$param => $value]) }})'>
    {{$title}}</button>
