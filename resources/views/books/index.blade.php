<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Book Management Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
          
                    @if (session('success'))
                        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-4">Book List</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">#</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Title</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Author</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Rating</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Created On</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Rate This Book</th>                                        
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Add Comment</th>
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">View Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($books as $book)
                                        @php $i++; @endphp
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800">{{ $i }}</td>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800">{{ $book->title }}</td>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800">{{ $book->author }}</td>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800">
                                                {{ round($book->ratings->avg('rating'), 1) ?? 'No Ratings' }} / 5
                                            </td>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800">
                                                {{ date('d M Y, h:i A', strtotime($book->created_at)) }}
                                            </td>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800">
                                                <!-- Rating Form -->
                                                @auth
                                                    <form action="{{ route('ratings.store') }}" method="POST" class="flex items-center">
                                                        @csrf
                                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                        <select name="rating" class="border border-gray-300 rounded-lg w-16 mr-2">
                                                            @for ($j = 1; $j <= 5; $j++)
                                                                <option value="{{ $j }}">{{ $j }}</option>
                                                            @endfor
                                                        </select>
                                                        <x-primary-button type="submit" class="ml-3">
                                                            {{ __('Rate') }}
                                                        </x-primary-button>
                                                    </form>
                                                @else
                                                    <p class="text-sm text-gray-500">Log in to rate</p>
                                                @endauth
                                            </td>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800">
                                                {!! App\Factories\CommentFactory::create('comment')->renderForm($book) !!}
                                            </td>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800">
                                                <a href="{{ route('books.comments', $book->id) }}" class="text-blue-500 hover:text-blue-700">
                                                    View Comments
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($books) == 0)
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-800 text-center" colspan="8">
                                                No Data Found
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $books->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
