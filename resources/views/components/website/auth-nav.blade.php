<nav class="flex space-x-4">
    <a href="{{ route('post.index') }}" class="hover:underline decoration-primary underline-offset-2">Posts</a>
    <a href="{{ route('post.create') }}" class="hover:underline decoration-primary underline-offset-2">Create Post</a>
    <a href="{{ route('media.index') }}" class="hover:underline decoration-primary underline-offset-2">Media</a>
@auth
    <form method="POST" action="{{ route('logout') }}" class="inline">@csrf 
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
    class="hover:underline decoration-primary underline-offset-2">Logout</a>
    </form>
@endauth
</nav>  