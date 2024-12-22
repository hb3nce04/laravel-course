<x-guest-layout title="Login" bodyClass="page-login">
    <h1 class="auth-page-title">Login</h1>
    <form action="" method="post">
        <div class="form-group">
            <input type="email" placeholder="Your Email"/>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Your Password"/>
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
