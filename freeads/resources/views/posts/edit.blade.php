<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashboard</a>

    {{-- Update form card --}}
    <div class="card">
        <h2 class="font-bold mb-4">Update your post</h2>

        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="input @error('title') ring-red-500 @enderror">

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category">Category : {{ $post->category}} </label></br>
            
                <select name="category" id="category" class="form-control" required value="{{ $post->category}}">
                    <option >--Please choose an option--</option>
                    <option value="Apple">Apple</option>
                    <option value="HP">HP</option>
                    <option value="Acer">Acer</option>
                    <option value="Lenovo">Lenovo</option>
                    <option value="Asus">Asus</option>
                    <option value="SAMSUNS">SAMSUNG</option>
                    <option value="Other">Other</option>
                </select>
                @error('category')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{-- Post Body --}}
            <div class="mb-4">
                <label for="description">Post description</label>
                <textarea name="description" rows="4" class="input @error('description') ring-red-500 @enderror">{{ $post->description }}</textarea>

                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Current cover photo if exists --}}
            @if ($post->image)
                <div class="h-auto rounded-md mb-4 w-1/6 overflow-hidden">
                    <label>Current photo</label>
                    <img class="object-cover object-center rounded-md" src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
            @endif

          
            <div class="mb-4">
                <label for="image"> select updatephoto</label>
                <input type="file" name="image" id="image" >

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price">Post price</label>
                <input type="number" name="price" value="{{ $post->price }}"
                    class="input @error('price') ring-red-500 @enderror">

                @error('price')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="location">Post location</label>
                <input type="text" name="location" value="{{ $post->location }}"
                    class="input @error('location') ring-red-500 @enderror">

                @error('location')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

           
            <button class="btn">Update</button>
        </form>
    </div>
</x-layout>