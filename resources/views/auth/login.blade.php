<x-guest-layout title="Login" bodyClass="page-login">
    <h1 class="auth-page-title">Login</h1>
    <x-alert/>
    <form action="{{route('auth.local')}}" method="post">
        @csrf
        <x-form.input name="email" type="text" placeholder="Your Email" autofocus="true" required="true"/>
        <x-form.input name="password" type="password" placeholder="Your Password" required="true"/>
        <div class="text-right mb-small">
            <a href="{{route('reset-password')}}" class="auth-page-password-reset"
            >Reset Password</a
            >
        </div>
        <div class="form-group">
            <label class="checkbox">
                <input type="checkbox" name="remember_me" value="1" @checked(old('remember_me'))/>
                Remember me
            </label>
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
