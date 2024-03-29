@props(['title' => null])

<div class="flex flex-col w-ful rounded-xl bg-base-100 shadow">

        @if($title)
    <div class="px-6 py-3 bg-base-200/50">

        <h2 class="text-2xl font-semibold">
            {{ $title }}
        </h2>
    </div>
        @endif

    <div class="p-6">
        {{ $slot }}
    </div>

</div>
