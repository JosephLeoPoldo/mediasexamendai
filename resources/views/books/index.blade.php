<x-app-layout>
    <div class="max-w-lg mx-auto p-4 sm:p-6 lg:p-8">
        <div class="flex justify-center mt-3">
            <x-secondary-button class="px-3 inline-flex items-center" onclick="location.href='{{ route('books.create') }}'">
                <svg viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8">
                    <path d="M8 1a3 3 0 1 0 .002 6.002A3 3 0 0 0 8 1zM6.5 8A4.491 4.491 0 0 0 2 12.5v.5c0 1.11.89 2 2 2h6v-1H7v-4h3V8.027A4.243 4.243 0 0 0 9.5 8zM11 8v3H8v2h3v3h2v-3h3v-2h-3V8zm0 0" fill="#2e3436"/>
                </svg>
                Agregar Nuevo Libro
            </x-secondary-button>
        </div>

        <h2 class="text-xl font-bold mt-6">Libros Pendientes</h2>
        @foreach ($books->where('status', false) as $book)
            <div class="bg-white block mt-6 p-6 border-gray-300 hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50 rounded-md shadow-sm">
                <div class="flex justify-end">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('books.edit', $book)">
                                Editar
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('books.destroy', $book) }}">
                                @csrf
                                @method('delete')
                                <x-dropdown-link :href="route('books.destroy', $book)" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Eliminar
                                </x-dropdown-link>
                            </form>
                            <form method="POST" action="{{ route('books.markAsRead', $book) }}">
                                @csrf
                                @method('PATCH')
                                <x-dropdown-link :href="route('books.markAsRead', $book)" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Marcar como leído
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>                    
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" viewBox="0 0 24 24" xml:space="preserve">
                            <path d="M12 20H0v-3.5c0-2.4 1.3-4.5 3.2-5.6C2.5 10.2 2 9.2 2 8.1c0-2.2 1.8-4 4-4s4 1.8 4 4c0 1.1-.4 2.1-1.2 2.8 1.9 1.1 3.2 3.3 3.2 5.6V20zM2 18h8v-1.5c0-2.4-1.8-4.5-4-4.5-2.1 0-4 2.1-4 4.5V18zM6 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm18 11H14v-2h10v2zm-3-4h-7v-2h7v2zm3-4H14V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        {{ $book->title }} - {{ $book->author }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        Año: {{ $book->year }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        Sinopsis: {{ Str::limit($book->synopsis, 100) }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        <a href="{{ $book->cover_url }}" target="_blank">Portada</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <h2 class="text-xl font-bold mt-6">Libros Leídos</h2>
        @foreach ($books->where('status', true) as $book)
            <div class="bg-white block mt-6 p-6 border-gray-300 hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50 rounded-md shadow-sm">
                <div class="flex justify-end">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('books.edit', $book)">
                                Editar
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('books.destroy', $book) }}">
                                @csrf
                                @method('delete')
                                <x-dropdown-link :href="route('books.destroy', $book)" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Eliminar
                                </x-dropdown-link>
                            </form>
                            <form method="POST" action="{{ route('books.markAsUnread', $book) }}">
                                @csrf
                                @method('PATCH')
                                <x-dropdown-link :href="route('books.markAsUnread', $book)" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Marcar como pendiente
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>                    
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" viewBox="0 0 24 24" xml:space="preserve">
                            <path d="M12 20H0v-3.5c0-2.4 1.3-4.5 3.2-5.6C2.5 10.2 2 9.2 2 8.1c0-2.2 1.8-4 4-4s4 1.8 4 4c0 1.1-.4 2.1-1.2 2.8 1.9 1.1 3.2 3.3 3.2 5.6V20zM2 18h8v-1.5c0-2.4-1.8-4.5-4-4.5-2.1 0-4 2.1-4 4.5V18zM6 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm18 11H14v-2h10v2zm-3-4h-7v-2h7v2zm3-4H14V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        {{ $book->title }} - {{ $book->author }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        Año: {{ $book->year }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        Sinopsis: {{ Str::limit($book->synopsis, 100) }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        <a href="{{ $book->cover_url }}" target="_blank">Portada</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
