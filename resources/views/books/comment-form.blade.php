<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Comment for {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form method="POST" action="{{ route('comments.store', $book->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                        <textarea name="comment" id="comment" rows="4" 
                                  class="mt-1 block w-full rounded-md border-gray-300"></textarea>
                    </div>
                    <x-primary-button type="submit">
                        Submit Comment
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
