@extends('layout.master')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error( error )
        })

    Dropzone.autoDiscover = false
    const myDropzone = new Dropzone('#image-upload', {
        headers: {
            'x-csrf-token': csrf,
        },
        paramName: 'image',
        url: '{{ route("post.upload-image", $post) }}',
    })
</script>
@endpush

@section('content')
<form action="{{ route('post.edit', $post) }}" method="POST">
    @csrf
    <div class="d-flex align-items-center mb-5">
        <h5 class="display-5 mb-0 text-center">{{ $post->title }}</h5>
        <button class="ms-auto btn btn-primary" type="submit">{{ __("Update") }}</button>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-8 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control{{ $errors->has('post.title') ? ' is-invalid' : '' }}" type="text" name="post[title]" value="{{ old('post.title') ?? $post->title }}">
                        @if ($errors->has('post.title'))
                            <p class="invalid-feedback">{{ $errors->first('post.title') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea id="editor" name="post[content]">{{ old('post.content') ?? $post->content }}</textarea>
                        @if ($errors->has('post.content'))
                            <p class="invalid-feedback">{{ $errors->first('post.content') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3">
                <div class="card-body">
                    @if ($post->has_image)
                    <img class="img-fluid" src="/uploads{{ $post->image }}" alt="{{ $post->title }}">
                    @else
                    <div id="image-upload" class="dropzone"></div>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Topic</label>
                        <select class="form-control{{ $errors->has('post.topic_id') ? ' is-invalid' : '' }}" name="post[topic_id]">
                            <option value="">Select a topic</option>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" {{ (old('post.topic_id') ?? $post->topic_id) == $topic->id ? 'selected' : '' }}>
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
                        <textarea class="form-control{{ $errors->has('post.description') ? ' is-invalid' : '' }}" type="text" name="post[description]">{{ old('post.description') ?? $post->description }}</textarea>
                        @if ($errors->has('post.description'))
                            <p class="invalid-feedback">{{ $errors->first('post.description') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
