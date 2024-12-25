<x-guest-layout title="Signup" bodyClass="page-signup">
    <h1 class="auth-page-title">Signup</h1>
    @if(session('success'))
        <div class="success-message">{{session('success')}}</div>
    @endif
    <form action="{{route('user.store')}}" method="post">
        @csrf
        <x-form.input name="email" type="email" placeholder="Your Email" autofocus="true" required="true"/>
        <x-form.input name="password" type="password" placeholder="Your Password" required="true"/>
        <x-form.input name="password2" type="password" placeholder="Repeat Password" required="true"/>
        <hr/>
        <x-form.input name="first_name" placeholder="First Name" required="true"/>
        <x-form.input name="last_name" placeholder="Last Name" required="true"/>
        <x-form.input name="phone" type="tel" placeholder="Phone" required="true"/>
        <button class="btn btn-primary btn-login w-full">Register</button>
    </form>
    <x-slot:footerLink>
        Already have an account? -
        <a href="{{route('login')}}"> Click here to login </a>
    </x-slot:footerLink>
</x-guest-layout>
