<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
    @vite('resources/css/app.css')
</head>
<body class=" bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded px-8 py-6 w-full max-w-sm">
        <h1 class="font-bold text-center text-gray-900 mb-4">Form Login</h1>
        <form action="{{route('loginProses')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="" class="block text-gray-900 font-bold mb-2">email</label>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="masukkan email" 
                class="w-full px-3 py-2 border border-gray-300 rounded">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="" class="block text-gray-900 font-bold mb-2">password</label>
                <input type="password" name="password" placeholder="masukkan password" 
                class="w-full px-3 py-2 border border-gray-300 rounded">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 rounded w-full hover:bg-blue-700">Login</button>
        </form>
    </div>
    @include('sweetalert::alert')
</body>
</html>