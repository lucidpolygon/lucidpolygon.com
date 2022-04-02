<x-website-layout>

@section('meta')<x-website.meta-nc />@endsection

<div class="container mx-auto p-5">

    <section class="md:flex justify-between border-b mb-5">
        <h1 class="mb-5 text-xl font-semibold">Posts Index</h1>
        <x-website.auth-nav />
    </section>

  <ol class="list-decimal list-inside">
  @foreach($posts as $post)
    <li><a href="{{ route('post.edit',$post->id) }}" class="hover:underline">{{ $post->title }}</a></li>
  @endforeach
  </ol>

</div>

</x-website-layout>