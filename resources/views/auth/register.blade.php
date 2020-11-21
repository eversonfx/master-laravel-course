@extends('layout')
@section('content')
<form method="POST" action="{{ route('register') }}">
  @csrf

  <div class="form-group">
    <label>Name</label>
    <input name="name" value="{{ old('name') }}" required class="form-control @error('name') is-invalid @enderror">

    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror

  </div>

  <div class="form-group">
    <label>E-mail</label>
    <input name="email" value="{{ old('email') }}" required
      class="form-control{{ $errors->has('email') ? ' is-invalid': '' }}">

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label>Password</label>
    <input name="password" required type="password"
      class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}">


    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label>Retyped Password</label>
    <input name="password_confirmation" required class="form-control" type="password">
  </div>

  <button type="submit" class="btn btn-primary btn-block">Register!</button>
</form>
@endsection('content')