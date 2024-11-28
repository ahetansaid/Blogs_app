<x-layout>
    @guest
        <x-enter />
    @endguest



    <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Latest Blog Posts</h2>


    {{-- List of posts --}}
    <div class="grid grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>

    {{-- Pagination links --}}
    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
