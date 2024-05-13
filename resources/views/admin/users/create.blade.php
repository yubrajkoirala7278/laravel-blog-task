@extends('admin.layouts.master')
@section('content')
    <div class="container bg-white p-4">
        <form class="row" method="POST" action="{{route('users.store')}}">
            @csrf
            {{-- name --}}
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            {{-- email --}}
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            {{-- password --}}
            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <div class="password-field">
                    <input type="password" name="password" class="form-control">
                    <button type="button" class="btn btn-transparent toggle-password" data-target="password">
                    </button>
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            {{-- confirm password --}}
            <div class="col-12">
                <label for="password" class="form-label">Enter Confirm Password</label>
                <div class="password-field">
                    <input type="password" name="password_confirmation" class="form-control">
                    <button type="button" class="btn btn-transparent toggle-password" data-target="password_confirmation">
                    </button>
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            {{-- role --}}
            <div class="col-12">
                <label for="role" class="form-label">Role</label>
                <div class="d-flex align-items-center" style="gap: 20px">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="admin" value="admin" checked>
                        <label class="form-check-label" for="admin">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="blog_manager"
                            value="blog_manager">
                        <label class="form-check-label" for="blog_manager">
                            Blog Manager
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="news_manager"
                            value="news_manager">
                        <label class="form-check-label" for="news_manager">
                            News Manager
                        </label>
                    </div>
                </div>
                @if ($errors->has('role'))
                    <span class="text-danger">{{ $errors->first('role') }}</span>
                @endif
                {{-- submit --}}
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

    </div>
@endsection

@section('script')
@endsection
