@extends('layouts.mainLayout')

@section('title', 'Register')

@section('content')
    <div class="flex h-screen bg-indigo-700">
        <div class="w-full max-w-xs m-auto bg-indigo-100 rounded p-5">   
            <header>
                <img class="w-20 mx-auto mb-5" src="https://img.icons8.com/fluent/344/year-of-tiger.png" />
            </header>   
            <form action="{{ route('auth.register') }}" method="POST" >
                @csrf
                @component('components.input')
                    @slot('text', 'Name')
                    @slot('field', 'name')
                    @slot('type', 'text')
                @endcomponent
                @component('components.input')
                    @slot('text', 'Email')
                    @slot('field', 'email')
                    @slot('type', 'email')
                @endcomponent
                @component('components.input')
                    @slot('text', 'Password')
                    @slot('field', 'password')
                    @slot('type', 'password')
                @endcomponent
                @component('components.input')
                    @slot('text', 'Confirm Password')
                    @slot('field', 'confirm_password')
                    @slot('type', 'password')
                @endcomponent
                
                @component('components.button')
                    @slot('text', 'Register')
                @endcomponent
            </form>  
            <footer>
                <a class="text-indigo-700 hover:text-pink-700 text-sm float-left" href="#">Forgot Password?</a>
                <a class="text-indigo-700 hover:text-pink-700 text-sm float-right" href="{{ route('login') }}">Do you have an account?</a>
            </footer>   
        </div>
    </div>
@endsection