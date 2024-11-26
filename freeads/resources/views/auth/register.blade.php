<x-layout>
    <h1 class="title">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('register') }}" method="post" x-data="formSubmit" @submit.prevent="submit">
            @csrf

            {{-- Username --}}
            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="input  @error('name') ring-red-500 @enderror">

                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="input @error('email') ring-red-500 @enderror">

                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{-- Password --}}
            <div class="mb-4">
                <label for="phone_number">Phone</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                    class="input @error('phone_number') ring-red-500 @enderror">

                @error('phone_number')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="input @error('password') ring-red-500 @enderror">

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-8">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="input @error('password') ring-red-500 @enderror">
            </div>

            

            {{-- Submit Button --}}
            <button x-ref="btn" class="btn">Register</button>
        </form>
    </div>
</x-layout>
