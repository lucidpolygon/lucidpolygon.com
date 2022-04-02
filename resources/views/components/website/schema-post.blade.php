    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "{{ $post->title }}",
    "image": [
@foreach($post->getMedia() as $image )
@if(substr($image->mime_type,0,5)  == "image")
        "{{$image->getFullUrl() }}",
@endif
@endforeach
      ],
    "datePublished": "{{ $post->created_at }}",
    "dateModified": "{{ $post->updated_at }}",
    "author": [{
        "@type": "Person",
        "name": "{{ $post->user->name }}",
        "url": ""
      }]
    }
    </script>