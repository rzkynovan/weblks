<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="title text-lg text-bold">Create Artikel</h1>
                    
                    <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <ul class=" list-unstyled mt-4 d-flex gap-4 flex-col">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <li>
                            <label class=" mb-2" for="title">Title</label>
                            <input type="text" name="title" id="title" 
                            class=" form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            value="{{ old() ?: '' }}" required>
                        </li>
                        <li>
                            <label for="content">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                        </li>
                        <li>
                            <label for="tag_id">Type</label>
                            <select name="tag_id" id="tag_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="" selected >Choose Type</option>
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            
                        </li>
                        <li>
                            <label class="mb-2" for="img">Title</label>
                            <input type="file" name="img" id="img" 
                            class=" form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            value="{{ old() ?: '' }}">
                        </li>
                        
                    </ul>

                    <button type="submit" class="btn bg-info text-white btn-info mt-8">Add now!</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
