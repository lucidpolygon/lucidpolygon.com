<x-website-layout>

    <x-website.meta-nc />

    <div class="container mx-auto p-5">

        <section class="md:flex justify-between border-b mb-5">
            <h1 class="mb-5 text-xl font-semibold">Media Upload Center</h1>
            <x-website.auth-nav />
        </section>

        <x-website.message />

        <section class="mb-5 p-5 outline">
            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="lg:flex">
                    <div class="w-full">
                        <label for="name" class="text-sm font-medium text-gray-700"> Name </label>
                        <input value="{{  old('name') }}" type="text" name="name" id="name" class="w-full sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0">
                    </div>
                    <div class="lg:w-3/12">
                        <label for="file" class="text-sm font-medium text-gray-700"> File </label>
                        <label class="bg-secondary/20 sm:text-sm border border-gray-300 flex justify-center py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <span class="ml-2">Image Upload</span>
                            <input type="file" id="file" name="file" class="hidden" />
                        </label>
                    </div>
                    <div class="lg:w-2/12">
                        <label for="model_id" class="text-sm font-medium text-gray-700"> Model Id </label>
                        <input value="{{  old('model_id') }}" type="text" name="model_id" id="model_id" class="w-full sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0">
                    </div>
                    <div class="lg:w-1/12">
                        <label for="action" class="text-sm font-medium text-gray-700"> Action </label>
                        <input type="submit" value="Save Media" class="w-full px-4 py-2 text-sm bg-primary text-white border hover:bg-secondary border-gray-300 hover:text-dark hover:border " />
                    </div>
                </div>
            </form>
        </section>

        <div class="table-responsive">
            <table class="table w-full">
                @foreach($files as $file)
                <tr class="border-2">
                    <td class="p-3"><a href="{{ route('post.edit',$file->model_id) }}">{{ $file->model_id }}</a></td>
                    <td class="p-3">
                        @if(substr($file->mime_type,0,5) == "image")
                        <img src="{{ $file->getUrl() }}" width="50" class="inline" />
                        @else
                        {{ explode('/', $file->mime_type)[1]}}
                        @endif
                    </td>
                    <td class="p-3">{{ $file->getFullUrl() }} <br /> {{ $file->human_readable_size }}</td>
                    <td class="flex p-3">
                        <form action="{{ route('media.update', $file->id ) }}" method="POST" enctype="multipart/form-data" class="inline" onSubmit="return confirm('Do you want to update?') ">
                            @method('PUT') @csrf
                            <input value="{{  old('order_column') ?? $file->order_column }}" type="text" name="order_column" id="order_column" class="w-1/12">
                            <input value="{{  old('name') ?? $file->name }}" type="text" name="name" id="name" class="w-4/6">
                            <input type="submit" value="Update" class="px-4 py-2 bg-primary text-white border hover:bg-secondary border-gray-300 hover:text-dark hover:border w-1/6" />
                        </form>
                    </td>
                    <td class="p-3">
                        <form action="{{ route('media.destroy', $file->id ) }}" method="POST" enctype="multipart/form-data" class="inline" onSubmit="return confirm('Do you want to delete?') ">
                            @method('DELETE') @csrf
                            <button type="submit" class="text-red-600 outline p-2 hover:bg-red-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>


        {{$files->links()}}


    </div>

</x-website-layout>