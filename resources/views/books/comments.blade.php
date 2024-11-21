<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Comments for Book: ') }} {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $book->author }}</p>
                        <p class="text-sm text-gray-600">{{ $book->description ?? 'No description available.' }}</p>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-lg font-semibold mb-4">Comments</h4>

                        @forelse ($comments as $comment)
                            <div class="border-b border-gray-200 pb-4 mb-4">
                                <p class="text-gray-800">{{ $comment->comment }}</p>
                                <p class="text-sm text-gray-500">Posted on {{ $comment->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No comments yet. Be the first to leave a comment!</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
