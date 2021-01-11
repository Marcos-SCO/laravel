<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="card-header">Upload images</h1>

                    <form action="{{ route('image.store') }}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="d-flex p-2 mt-1 relative rounded-md shadow-sm">
                            <label for="img">Select</label>
                            <input type="file" name="img[]" id="img" multiple accept="image/*">
                        </div>
                        <input type="submit" value="upload" class="mt-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>