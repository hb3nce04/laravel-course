<x-guest-layout title="Signup" bodyClass="page-signup">
    <h1 class="auth-page-title">Signup</h1>
    @if(session('success'))
        <div class="success-message">{{session('success')}}</div>
    @endif
    <form action="{{route('user.store')}}" method="post">
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
        <div class="form-group @error('password2') has-error @enderror">
            <input type="password" placeholder="Repeat Password" name="password2"
                   required/>
            @error('password2')
            <div class="error-message">{{$message}}</div>
            @enderror
        </div>
        <hr/>
        <div class="form-group @error('first_name') has-error @enderror">
            <input type="text" placeholder="First Name" name="first_name" value="{{old('first_name')}}" required/>
            @error('first_name')
            <div class="error-message">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group @error('last_name') has-error @enderror">
            <input type="text" placeholder="Last Name" name="last_name" value="{{old('last_name')}}" required/>
            @error('last_name')
            <div class="error-message">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group @error('phone') has-error @enderror">
            <input type="tel" placeholder="Phone" name="phone" value="{{old('phone')}}" required/>
            @error('phone')
            <div class="error-message">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-primary btn-login w-full">Register</button>
    </form>
    <x-slot:footerLink>
        Already have an account? -
        <a href="{{route('login')}}"> Click here to login </a>
    </x-slot:footerLink>
</x-guest-layout>
