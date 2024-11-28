<x-layout>
    <h2>Profile</h2>
    <form class="profile-form" method="post" action="{{ route('profil')}}">
        @csrf
        {{-- Username --}}
        <div class="mb-4">
            <label for="username">Username</label>
            <input type="text" name="username" value="{{ Auth()->user()->username }}"
                class="input  @error('username') ring-red-500 @enderror">
    
            @error('username')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
    
        {{-- Email --}}
        <div class="mb-4">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ Auth()->user()->email }}"
                class="input @error('email') ring-red-500 @enderror">
    
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
       
        <button class="btn-up">Saves changes</button>
    </form>  

    <form id="delete-account-form" method="post" action="{{ route('delete-account') }}">
        @csrf
        {{-- Delete Account Button --}}
        <button type="button" id="delete-account-btn" class="btn-down">
            <i class="fa-solid fa-trash"></i> Delete Account
        </button>
    </form>
    
    <script>
        document.getElementById('delete-account-btn').addEventListener('click', function (event) {
            event.preventDefault();
    
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4CAF50',
                cancelButtonColor: '#FF5733',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-account-form').submit();
                }
            });
        });
    </script>
    
</x-layout>
