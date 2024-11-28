<x-layout>
    <h1 class="title">Search Results</h1>
    <p class="mb-4">Results for: <strong>{{ request('query') }}</strong></p>

    @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}" />
    @elseif (session('delete'))
        <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
    @endif

    @if ($posts->isEmpty())
        <p>No posts found.</p>
    @else
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <x-postCard :post="$post">
                </x-postCard>
            @endforeach
        </div>

        <div>
            {{ $posts->links() }}
        </div>
    @endif
</x-layout>
