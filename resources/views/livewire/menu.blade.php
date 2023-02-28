<div>
    <nav class="bg-[#006699] text-white w-full font-bold">
        <div class="flex justify-between items-center w-5/6 container mx-auto py-2">
            <img src="../imgs/logoenoe.png" alt="logo" class="w-40 object-cover"/>
            <div class="flex items-center space-x-3">
                @foreach ($menuItems as $menuItem)
                    <div class="flex flex-col items-center justify-center text-lg">
                        <a href="{{ url($menuItem->path) }}"
                           class="rounded-full hover:text-[#c7f768] text-center w-full">
                            {{ $menuItem->title }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </nav>
</div>
