@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="display-5 mb-5 text-center">{{ __("Make a post") }}</h5>
                <form action="{{ route('post.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control{{ $errors->has('post.title') ? ' is-invalid' : '' }}" type="text" name="post[title]" value="{{ old('post.title') }}">
                        @if ($errors->has('post.title'))
                            <p class="invalid-feedback">{{ $errors->first('post.title') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Topic</label>
                        <select class="form-control{{ $errors->has('post.topic_id') ? ' is-invalid' : '' }}" name="post[topic_id]">
                            <option value="">Select a topic</option>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" {{ old('post.topic_id') == $topic->id ? 'selected' : '' }}>
                                    {{ $topic->title }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('post.topic_id'))
                            <p class="invalid-feedback">{{ $errors->first('post.topic_id') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control{{ $errors->has('post.description') ? ' is-invalid' : '' }}" type="text" name="post[description]">{{ old('post.description') }}</textarea>
                        @if ($errors->has('post.description'))
                            <p class="invalid-feedback">{{ $errors->first('post.description') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control{{ $errors->has('post.content') ? ' is-invalid' : '' }}" type="text" name="post[content]">{{ old('post.content') }}</textarea>
                        @if ($errors->has('post.content'))
                            <p class="invalid-feedback">{{ $errors->first('post.content') }}</p>
                        @endif
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-lg btn-primary" type="submit">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
