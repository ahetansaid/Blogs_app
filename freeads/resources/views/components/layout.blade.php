<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900">
    <header class="bg-sky-500 shadow-lg">
        <nav>
            <a href="{{ route('posts.index') }}" class="nav-link">Free_app</a>
                
            @auth
                <div class="relative grid place-items-center" x-data="{ open: false }">

                    <button @click="open = !open" type="button" class="round-btn">
                        <img src="https://picsum.photos/200" alt="">
                    </button>

                    <div x-show="open" @click.outside="open =false"
                        class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light">

                        <a href="#" class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">{{ auth()->user()->name }}</a>

                        <a href="{{ route('profil') }}" class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Profil</a>

                        <a href="{{ route('dashboard') }}"
                            class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Dashboard</a>


                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="block w-full text-left hover:bg-slate-100 pl-4 pr-8 py-2">Logout</button>
                        </form>

                    </div>
                </div>
            @endauth

            @guest
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </div>
            @endguest
        </nav>
    </header>

    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{ $slot }}
    </main>


    <script>
        // Set form: x-data="formSubmit" @submit.prevent="submit" and button: x-ref="btn"
        document.addEventListener('alpine:init', () => {
            Alpine.data('formSubmit', () => ({
                submit() {
                    this.$refs.btn.disabled = true;
                    this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                    this.$refs.btn.classList.add('bg-indigo-400');
                    this.$refs.btn.innerHTML =
                        `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                        <i class="fa-solid fa-spinner animate-spin"></i>
                        </span>Please wait...`;

                    this.$el.submit()
                }
            }))
        })
    </script>
</body>

</html>
