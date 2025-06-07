    <head>
    @vite('resources/css/app.css')
    </head>
    <body class="flex justify-center items-center h-screen bg-black">
    <form method="POST" class="flex flex-col gap-2 w-1/4 text-white" action="/admin/login">
        @csrf
        <label for="login">Login</label>
        <input id="login" name="login" type="text" required class="border @error('login') border-red-400 @else is-valid @enderror"></input>
        <label for="password">Password</label>
        <input id="password" name="password" type="text" required class="border @error('password') border-red-400 @else is-valid @enderror"></input>
        <button type="submit" name="submit" class="border bg-emerald-600 text-black mt-1">Login</button>
        @error('login')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
        @error('password')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </form>
    </body>

