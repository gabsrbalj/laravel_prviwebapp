@extends('layouts.app')

@section('content')
    <div class="flex justify-center" >
        <div class="w-4/12 bg-white  p-7 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="Tvoj E-mail"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Lozinka</label>
                    <input type="password" name="password" id="password" placeholder="Lozinka"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">

                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Zapamti me</label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4
                    py-3 rounded font-medium w-full">Prijavi se</button>
                </div>
            </form>
        </div>
    </div>
@endsection
