<x-layout>
    <h2>Profile</h2>
<form class="profile-form" method="post" action="{{ route('profil')}}">
    @csrf
    {{-- Username --}}
    <div class="mb-4">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ Auth()->user()->name }}"
            class="input  @error('name') ring-red-500 @enderror">

        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email --}}
    <div class="mb-4">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ Auth()->user()->email }}" disabled
            class="input @error('email') ring-red-500 @enderror">

    
    </div>
    <div class="mb-4">
        <label for="phone_number">Phone</label>
        <input type="text" name="phone_number" value="{{ Auth()->user()->phone_number }}"
            class="input @error('phone_number') ring-red-500 @enderror">

        @error('phone_number')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
   
    <button x-ref="btn" class="btn">Saves changes</button>
</form> 

</x-layout>