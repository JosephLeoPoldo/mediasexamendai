<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('books.store') }}">
            @csrf
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="title" class="block text-md font-medium leading-6 text-gray-900">Título</label>
                    <div class="mt-2">
                        <input type="text" name="title" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required value="{{ old('title') }}">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="author" class="block text-md font-medium leading-6 text-gray-900">Autor</label>
                    <div class="mt-2">
                        <input type="text" name="author" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required value="{{ old('author') }}">
                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="year" class="block text-md font-medium leading-6 text-gray-900">Año de Publicación</label>
                    <div class="mt-2">
                        <input type="number" name="year" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required value="{{ old('year') }}">
                        <x-input-error :messages="$errors->get('year')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="synopsis" class="block text-md font-medium leading-6 text-gray-900">Sinopsis</label>
                    <div class="mt-2">
                        <textarea name="synopsis" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>{{ old('synopsis') }}</textarea>
                        <x-input-error :messages="$errors->get('synopsis')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="cover_url" class="block text-md font-medium leading-6 text-gray-900">URL de la Portada</label>
                    <div class="mt-2">
                        <input type="url" name="cover_url" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required value="{{ old('cover_url') }}">
                        <x-input-error :messages="$errors->get('cover_url')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="mt-8 flex items-center justify-center gap-x-6">
                <x-primary-button>Guardar</x-primary-button>
                <x-secondary-button onclick="location.href='{{ route('books.index') }}'">Cancelar</x-secondary-button>
            </div>
        </form>
    </div>
</x-app-layout>
