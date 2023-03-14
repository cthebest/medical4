@php
    $showMenu = $opened ? 'display:block;' : 'display:hidden';
@endphp
<div>
    <header class="navigation">
        <a href="{{ url('/') }}"><img src="{{ asset('imgs/logoenoe.png') }}" alt="logo" class="logo" /></a>
        <button type="button" class="hamburguer" wire:click="open"><i class="fa-solid fa-bars"></i></button>
        <nav class="menu-desktop">
            <ul>
                @foreach ($menuItems as $menuItem)
                    <li>
                        <a href="{{ url($menuItem->path) }}">
                            {{ $menuItem->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </header>
    <div class="menu" style="{{ $showMenu }}">
        <ul>
            @foreach ($menuItems as $menuItem)
                <li>
                    <a href="{{ url($menuItem->path) }}">
                        {{ $menuItem->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
