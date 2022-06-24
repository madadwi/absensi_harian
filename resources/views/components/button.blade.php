<style>
    #button-lr {
        background-image: radial-gradient(purple, black);
        box-shadow: 0px 0px 10px grey;
        transition: .5s;
    }

    #button-lr:hover {
        transform: scale(1.04);
    }
</style>

<button id="button-lr" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
