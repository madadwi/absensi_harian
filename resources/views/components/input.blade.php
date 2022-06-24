@props(['disabled' => false])

<style>
    #input-content{
        background-color: transparent;
        color: white;
        box-shadow: 0px 1px 5px white;
    }
</style>

<input id="input-content" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
