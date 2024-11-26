@props(['post', 'full' => false])

<div class="card">
    <div class="flex gap-6">
     
        <div class="h-auto w-1/5 rounded-md overflow-hidden self-start">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="">
            @else
                <img class="object-cover object-center rounded-md" src="{{ asset('storage/posts_images/default.jpeg') }}" alt="">
            @endif
        </div>

        <div class="w-4/5">
           
            <h2 class="font-bold text-xl">{{ $post->title }}</h2>

           
            <div class="text-xs font-light mb-4">
                <span>Posted {{ $post->created_at->diffForHumans() }} and update {{ $post->updated_at->diffForHumans() }} by </span>
                <a href="{{ route('posts.user', $post->user) }}"
                    class="text-blue-500 font-medium">{{ $post->user->name }}</a>
            </div>
            <div class="text-sm">
                Price : <span>{{ $post->price}}</span> USD
            </div>
            <div class="text-sm">
                Location : <span>{{ $post->location}}</span>
            </div>

            <div class="text-sm">
                Author Phone number : <span>{{ $post->user->phone_number}}</span>
            </div>
       
            @if ($full)
               
                <div class="text-sm">
                   Description : <span>{{ $post->description}}</span>
                </div>
            @else
                
                <div class="text-sm">
                    <span>{{ Str::words($post->body, 15) }}</span>
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-2">Read more &rarr;</a>
                </div>
            @endif
        </div>

    </div>


   
    <div>
        {{ $slot }}
    </div>
</div>
