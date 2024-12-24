<x-guest-layout title="Login" bodyClass="page-login">
    <h1 class="auth-page-title">Login</h1>
    <form action="{{route('auth.local')}}" method="post">
        @csrf
        <div class="form-group @error('email') has-error @enderror">
            <input type="email" placeholder="Your Email" name="email" value="{{old('email')}}" autofocus required/>
            @error('email')
            <div class="error-message">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group @error('password') has-error @enderror">
            <input type="password" placeholder="Your Password" name="password" required/>
            @error('password')
            <div class="error-message">{{$message}}</div>
            @enderror
        </div>
        <div class="text-right mb-medium">
            <a href="{{route('reset-password')}}" class="auth-page-password-reset"
            >Reset Password</a
            >
        </div>
        <button class="btn btn-primary btn-login w-full">Login</button>
        <div class="grid grid-cols-2 gap-1 social-auth-buttons">
            <x-google-button/>
            <x-fb-button/>
        </div>
    </form>
    <x-slot:footerLink>
        Don't have an account? -
        <a href="{{route('signup')}}"> Click here to create one</a>
    </x-slot:footerLink>
</x-guest-layout>
