    <!-- Meta Tags -->
    <title>{{ $post->meta_title }}</title>
    <meta name="title" content="{{ $post->meta_title }}">
    <meta name="description" content="{{ $post->meta_description }}">

    @php
    $img = $post->getMedia()->where('name','featured')->first();
    if ($img) $img = $img->getUrl();
    @endphp

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $post->type == 'post' ? 'article' : 'website' }}">
    <meta property="og:url" content="{{ url($post->slug) }}">
    <meta property="og:title" content="{{ $post->meta_title }}">
    <meta property="og:description" content="{{ $post->meta_description }}">
@if($img)
    <meta property="og:image" content="{{ $img }}">
@endif
    <!-- Twitter -->
    <meta property="twitter:card" content="{{ is_null($post->featured_image) ? 'summary' : 'summary_large_image' }}">
    <meta property="twitter:url" content="{{ url($post->slug) }}">
    <meta property="twitter:title" content="{{ $post->meta_title }}">
    <meta property="twitter:description" content="{{ $post->meta_description }}">
@if($img)
    <meta property="twitter:image" content="{{ $post->featured_image }}">
@endif