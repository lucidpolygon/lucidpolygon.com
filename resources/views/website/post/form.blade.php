<x-website-layout>

<div class="container mx-auto p-5">

@section('meta')<x-website.meta-nc />@endsection

    <section class="md:flex justify-between border-b mb-5">
        <h1 class="mb-5 text-xl font-semibold">Create Post</h1>
        <x-website.auth-nav />
    </section>

@if(isset($post->id))

<form action="{{ route('post.update', $post->id ) }}" method="POST">
@method('PUT') 

@else

<form action="{{ route('post.store') }}" method="POST">

@endif

@csrf

<input type="hidden" name="author_id" value="{{ auth()->user()->id  }}" />


<div class="flex-col space-y-6">
    
    <x-website.message />

    <div class="md:flex">
        <div class="form-group w-full">
            <label for="title" class="text-sm font-medium text-gray-700"> Title </label>
            <input value="{{  old('title') ?? $post->title  }}" type="text" name="title" id="title" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0">
        </div>

        <div class="form-group w-1/12">
            <label for="slug" class="text-sm font-medium text-gray-700"> Action </label>
            <input type="submit" value="Save Post" class="px-4 py-2 text-sm bg-primary text-white border hover:bg-secondary border-gray-300 hover:text-dark hover:border "/>
        </div>

    </div>

    <div class="form-group">
        <label for="content" class="text-sm font-medium text-gray-700 flex justify-between"> Content </label>
        <textarea name="content" id="content" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0" rows="20">{{ old('content') ?? $post->content }}</textarea>
    </div>

    <div class="md:flex">

        <div class="form-group w-full">
            <label for="is_code" class="text-sm font-medium text-gray-700"> Is Code? </label>
            <input value="{{ old('is_code') ?? $post->is_code }}" type="text" name="is_code" id="is_code" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0">
        </div>

        <div class="form-group w-full">
            <label for="type" class="text-sm font-medium text-gray-700"> Type </label>
            <input value="{{ old('type') ?? $post->type }}" type="text" name="type" id="type" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0">
        </div>

        <div class="form-group w-full">
            <label for="status" class="text-sm font-medium text-gray-700"> Status </label>
            <input value="{{ old('status') ?? $post->status }}" type="text" name="status" id="status" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0">
        </div>

        <div class="form-group w-full">
            <label for="created_at" class="text-sm font-medium text-gray-700"> Created At </label>
            <input value="{{ old('created_at') ?? $post->created_at }}" type="text" name="created_at" id="created_at" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0">
        </div>

        <div class="form-group w-full">
            <label for="updated_at" class="text-sm font-medium text-gray-700"> Updated At </label>
            <input value="{{ old('updated_at') ?? $post->updated_at }}" type="text" name="updated_at" id="updated_at" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0">
        </div>

    </div>

    <div class="form-group" x-data="{ count: 0, max: 70 }" x-init="count = $refs.countme.value.length">
        <label for="slug" class="text-sm font-medium text-gray-700 flex justify-between"> 
            <span>Slug</span>
            <span>
                <span x-html="count"></span> / <span x-html="max"></span>
            </span>
        </label>
        <input value="{{ old('slug') ?? $post->slug }}" type="text" name="slug" id="slug" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0" x-ref="countme" x-on:keyup="count = $refs.countme.value.length">
    </div>

    <div class="form-group" x-data="{ count: 0, max: 70 }" x-init="count = $refs.countme.value.length">
        <label for="meta_title" class="text-sm font-medium text-gray-700 flex justify-between"> 
            <span>Meta Title</span>
            <span>
                <span x-html="count"></span> / <span x-html="max"></span>
            </span>
        </label>
        <input value="{{ old('meta_title') ?? $post->meta_title }}" type="text" name="meta_title" id="meta_title" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0" x-ref="countme" x-on:keyup="count = $refs.countme.value.length">
    </div>

    <div class="form-group" x-data="{ count: 0, max: 200 }" x-init="count = $refs.countme.value.length">
        <label for="meta_description" class="text-sm font-medium text-gray-700 flex justify-between">
            <span>Meta Description</span>
            <span>
                <span x-html="count"></span> / <span x-html="max"></span>
            </span>
        </label>
        <textarea name="meta_description" id="meta_description" class="w-full rounded-none sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0" rows="2" x-ref="countme" x-on:keyup="count = $refs.countme.value.length">{{ old('meta_description') ?? $post->meta_description }}</textarea>
    </div>

</div>

</form>

</div>

</x-website-layout>