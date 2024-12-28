<x-guest-layout title="Password Reset" bodyClass="page-login">
    <h1 class="auth-page-title">Password Reset</h1>
    <x-alert/>
    <form action="{{route('user.change-password')}}" method="post">
        @csrf
        <x-form.input name="email" type="email" placeholder="Your Email" autofocus="true" required="true"/>
        <x-form.input name="password" type="password" placeholder="Your New Password" required="true"/>
        <x-form.input name="password2" type="password" placeholder="Your New Password Again" required="true"/>
        <input type="hidden" name="token" value="{{$token}}">

        <button class="btn btn-primary btn-login w-full">
            Request password reset
        </button>
    </form>
</x-guest-layout>
