<style>
    #outer-bg {
        background-image: linear-gradient(135deg, black, purple, indigo);
    }

    #outer-content {
        background-color: black;
        box-shadow: 0px 0px 10px white;
    }
</style>

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" id="outer-bg">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" id="outer-content">
        {{ $slot }}
    </div>
</div>
