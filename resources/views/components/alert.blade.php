@props(['type' => 'success'])

@if ($type === 'error')
    <div class="border border-red-500 bg-red-100 rounded-lg p-4">
    <h1 class="text-lg font-bold text-red-500">Error</h1>
    <p class="text-red-500">{{ $slot }}</p>
</div>
@elseif ($type === 'warning')
    <div class="border border-yellow-500 bg-yellow-100 rounded-lg p-4">
    <h1 class="text-lg font-bold text-yellow-500">Warning</h1>
    <p class="text-yellow-500">{{ $slot }}</p>
</div>
@elseif ($type === 'success')
    <div class="border border-green-500 bg-green-100 rounded-lg p-4">
    <h1 class="text-lg font-bold text-green-500">Success</h1>
    <p class="text-green-500">{{ $slot }}</p>
</div>
@elseif ($type === 'info')
    <div class="border border-blue-500 bg-blue-100 rounded-lg p-4">
    <h1 class="text-lg font-bold text-blue-500">Info</h1>
    <p class="text-blue-500">{{ $slot }}</p>
</div>
@endif