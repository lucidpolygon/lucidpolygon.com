<x-website-layout>

@if($post->is_code)
@push('highlight.js')
<!-- Highlight.js Syntax Highlighter -->
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.27.0/prism.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.27.0/themes/prism-okaidia.min.css">
@endpush
@endif

@if($post->type == "post")
 
 @section('meta')<x-website.meta :post="$post" /> <x-website.schema-post :post="$post" />@endsection

    
    <article class="prose lg:prose-xl mx-auto px-3 my-12">
        
        <h1>{{ $post->title }}</h1>
        
        <p>
            <time datetime="{{ $post->created_at }}">{{ $post->created_at }} |
                <span itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="author">
                {{ $post->user->name }}
                </span>
            </time>
        </p>
        
        {!! $post->content !!}

    </article>

@endif

@if($post->type == "page")
 @section('meta')<x-website.meta :post="$post" /> <x-website.schema-page />@endsection
 {!! $post->content !!}
@endif


</x-website-layout>