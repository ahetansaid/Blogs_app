<x-layout>

    <h1 class="title">Welcome {{ auth()->user()->name }}, you have {{ $posts->total() }} posts</h1>

    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>


        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif


        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="input @error('title') ring-red-500 @enderror">

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category">Category</label></br>

                <select name="category" id="category" class="form-control" required>
                    <option >--Please choose an option--</option>
                    <option value="Apple">Apple</option>
                    <option value="HP">HP</option>
                    <option value="Acer">Acer</option>
                    <option value="Lenovo">Lenovo</option>
                    <option value="Asus">Asus</option>
                    <option value="SAMSUNS">SAMSUNG</option>
                    <option value="Other">Other</option>
                </select>
                @error('Category')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description">Post description</label>

                <textarea name="description" rows="4" class="input @error('description') ring-red-500 @enderror">{{ old('description') }}</textarea>

                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="image">Select photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price">Post price</label>
                <input type="number" name="price" value="{{ old('price') }}"
                    class="input @error('price') ring-red-500 @enderror">

                @error('price')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            


            <div class="mb-4">
                <label for="location">location</label>
                <input type="text" name="location" value="{{ old('location') }}"
                    class="input @error('location') ring-red-500 @enderror">

                @error('location')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
           


            <button class="btn">Create</button>

        </form>
    </div>


    <h2 class="font-bold mb-4">Your Latest Posts</h2>


    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post">

                <div class="flex items-center justify-end gap-4 mt-6">

                    <a href="{{ route('posts.edit', $post) }}"
                        class="bg-green-500 text-white px-2 py-1 text-xs rounded-md">Update</a>


                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">Delete</button>
                    </form>
                </div>
            </x-postCard>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
