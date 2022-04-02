<header class="sticky top-0 bg-white drop-shadow-md" x-data="{ open: false, toggle() { this.open = this.open ? this.close() : true }, close() { this.open = false } }" id="header">
    <div class="container mx-auto flex justify-between items-center p-5">
        <a href="@auth {{ route('dashboard') }} @else {{ route('post.show') }} @endif" class="font-medium items-center">
            <span class="text-xl px-6 py-2 border-primary border-double border-4 bg-gradient-to-b from-white to-secondary hover:bg-gradient-to-t">Lucid Polygon</span>
        </a>
        <button class="font-medium items-center text-xl ml-3 px-3 py-2 border-primary border-double border-4 bg-gradient-to-b from-white to-secondary hover:bg-gradient-to-t md:hidden" @click="toggle">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" x-show="!open">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" x-show="open">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <nav class="hidden md:block">
@foreach(config('navigation.links') as $link)
@if($link['name'] <> "contact")
            <a href="{{ route('post.show',$link['slug']) }}" class="block md:inline w-full mr-5 py-1 hover:underline hover:underline-offset-2 hover:decoration-primary {{ url()->current() == url($link['slug'])  ? 'underline decoration-2 underline-offset-2 decoration-primary' : '' }}">{{$link['text']}}</a>
@endif
@endforeach
            <a href="contact" class="inline-flex items-center py-2 px-3 bg-primary border-0 hover:bg-secondary hover:text-dark hover:outline rounded text-white">Contact
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </nav>
    </div>

    <div class="absolute px-2 bg-gradient-to-b from-white to-secondary w-full py-2 border-b-2 border-primary drop-shadow-2xl text-dark/80" style="display: none;" x-show="open">
@foreach(config('navigation.links') as $link)
        <a href="{{ route('post.show',$link['slug']) }}">
            <p class="ml-5 py-2 text-2xl font-serif font-medium {{ url()->current() == url($link['slug'])  ? 'text-primary' : '' }}">{{$link['text']}}</p>
        </a>
@endforeach
    </div>
</header> 