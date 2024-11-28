@props(['post', 'full' => false])

<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl rounded-lg overflow-hidden mx-auto font-[sans-serif] mt-4">
    <div class="min-h-[256px]">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-full h-auto object-cover">
        @else
            <img class="w-full h-auto object-cover" src="{{ asset('storage/posts_images/default.jpeg') }}" alt="">
        @endif
    </div>

    <div class="p-6">
        <h2 class="font-bold text-xl">{{ $post->title }}</h2>

        {{-- Author and Date --}}
        <div class="text-xs font-light mb-4">
            <span>Posted {{ $post->created_at->diffForHumans() }} by </span>
            <a href="{{ route('posts.user', $post->user) }}" class="text-pink-600 font-medium">{{ $post->user->username }}</a>
        </div>

        {{-- Body --}}
        @if ($full)
            {{-- Show full body text in single post page --}}
            <div class="text-sm">
                <span>{{ $post->body }}</span>
            </div>
        @else
            {{-- Show limited body text in single post page --}}
            <div class="text-sm">
                <span>{{ Str::words($post->body, 15) }}</span>
                <a href="{{ route('posts.show', $post) }}" class="text-pink-600 ml-2">Read more &rarr;</a>
            </div>
        @endif
    </div>

    <div>
        {{ $slot }}
    </div>
</div>
