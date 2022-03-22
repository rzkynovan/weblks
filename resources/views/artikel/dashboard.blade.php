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
                    <h1>Artikel yang anda buat</h1>

                    <div class="table-responsif mt-8">
                        <div class="table-header">
                            <a href="{{ route('artikel.create') }}" class="btn btn-primary">Buat Artikel</a>
                        </div>
                        <div class="table-body">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @forelse ($artikels as $artikel)
                                        <tr>
                                            <td>{{ $loop -> iteration }}</td>
                                            <td>{{ $artikel -> title }}</td>
                                            {{-- <td><a href="" class="btn btn-sm btn-primary">see post</a></td> --}}
                                            <td><a class="btn btn-sm btn-primary" href="https://bucket-weblks.s3.ap-southeast-1.amazonaws.com/artikel/images/{{ $artikel -> img }}">Lihat Foto</a></td>
                                            <td>{{ $artikel -> created_at }}</td>
                                            <td>{{ $artikel -> updated_at }}</td>
                                            <td class=" d-flex justify-center list-unstyled gap-2">
                                                <li>
                                                    <a class="btn btn-sm btn-primary" href="">Edit</a>
                                                </li>
                                                <li>
                                                    <a class="btn btn-sm btn-danger" href="" onclick="confirm('are you sure to delete {{  $artikel -> title }}?')">Delete</a>
                                                </li>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class=" text-warning">You dont have artikel yet, do you want to post something? <a class="btn btn-sm btn-primary" href="{{ route('artikel.create') }}">yes</a></p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
