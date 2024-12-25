<x-guest-layout title="Password Reset" bodyClass="page-login">
    <h1 class="auth-page-title">Request Password Reset</h1>
    <form action="" method="post">
        <x-form.input name="email" type="email" placeholder="Your Email" autofocus="true" required="true"/>

        <button class="btn btn-primary btn-login w-full">
            Request password reset
        </button>

        <div class="login-text-dont-have-account">
            Already have an account? -
            <a href="{{route('login')}}"> Click here to login </a>
        </div>
    </form>
</x-guest-layout>
