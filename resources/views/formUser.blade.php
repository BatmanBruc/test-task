@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if (isset($success))
                    @if ($success == 1)
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @elseif ($success == 0)
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @elseif ($success == 2)
                        <div class="alert alert-info" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                @endif
            <div class="card">
                <div class="card-header">{{ __('Заявка') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('form') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="theme" class="col-md-4 col-form-label text-md-right">{{ __('Theme') }}</label>

                            <div class="col-md-6">
                                <input id="theme" type="theme" class="form-control @error('theme') is-invalid @enderror" name="theme" value="{{ old('theme') }}" autocomplete="theme" autofocus>

                                @error('theme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="theme" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
                            <div class="col-md-6">
                                <input id="message" type="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" autofocus>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="theme" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" autocomplete="file" autofocus>

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Отправить') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
