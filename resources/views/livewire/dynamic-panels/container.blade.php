<x-dynamic-panels::container class="w-full h-full" :interval="$interval">

    @if ($type === 'component')
    <x-dynamic-component :component="$panel" />
    @endif

    @if($type === 'livewire')
    <livewire:is :component="$panel" />
    @endif

</x-dynamic-panels::container>
