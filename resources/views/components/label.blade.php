@props(['value'])

<style> 
    #text-info {
        color: white;
        font-weight: bold;
    }
</style>

<label id="text-info" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
