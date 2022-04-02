<section>
  <div class="container px-5 py-24 mx-auto">
    <div class="-my-8 divide-y-2 divide-gray-100">
    @foreach($posts as $post)
      <div class="py-8 flex flex-wrap md:flex-nowrap">
        <div class="md:flex-grow">
          <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $post->title }}</h2>
          <p class="leading-relaxed">{{ $post->excerpt }}</p>
            <a  href="{{ url($post->slug) }}" class="mt-3 text-primary inline-flex items-center hover:underline underline-offset-2">Learn More
                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                    viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
            
            @auth
            <a href="{{ route('post.edit',$post->id) }}">Edit</a>
            @endauth
        </div>
      </div>
    @endforeach
    </div>
  </div>
</section>