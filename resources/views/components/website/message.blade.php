<section class="mb-4">
@if(session()->has('success'))
    <div class="bg-secondary px-3 py-2 w-full">
        {{ session()->get('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="text-red-500 text-sm">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</section>