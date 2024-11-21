@extends('layouts.app')

@section('content')
    <div class="bg-white px-6 py-32 lg:px-8">
        <div class="mx-auto max-w-3xl text-base/7">
            <!-- <p class="text-base/7 font-semibold text-indigo-600">Introducing</p> -->
            <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight sm:text-5xl">{{ $post->title }}</h1>
            <p class="mt-6 text-xl/8">{{ $post->excerpt }}</p>
            <figure class="mt-16">
                <img class="aspect-video rounded-xl bg-gray-50 object-cover"
                    src="{{ $post->image }}"
                    alt="">
            </figure>
            <div class="mt-16 max-w-2xl">
                <p class="mt-6">{{ $post->body }}</p>
            </div>
            <div>
                <p class="mt-2 text-bold"> By <strong>{{ $post->author->name }}</strong> </p>
            </div>
            <!-- Comment Form **Maybe I should use extend since it's the same for all blog post?-->
            <div class="mt-10">
                <h2 class="text-xl font-bold mb-4">Leave a Comment</h2>
                <form id="comment-form" action="{{ route('comment', $post) }}" method="POST" class="space-y-6">
                @csrf
                    <div>
                        <label for="name" class="text-sm font-medium">Name</label>
                        <input type="text" name="name" id="name" required class="p-2 mt-1  w-full border border-gray-300 rounded-md sm:text-sm">
                    </div>
                    <div>
                        <label for="body" class=" text-sm font-medium">Comment</label>
                        <textarea name="body" rows="4" id="body" required class="p-2 mt-1  w-full border border-gray-300 rounded-md sm:text-sm"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

            
@if($post->comments->isNotEmpty())
            <div class="mt-16 ">
            <h2 class="text-xl font-bold mb-4">Comments</h2>
    @foreach($post->comments as $comment)
            <div class="border-b border-gray-900 py-4 ">
                <p class="text-base font-medium">{{ $comment->name }}</p>
                <p class="text-sm mt-2 text-gray-700 break-words">{{ $comment->body }}</p>
                <p class="text-sm mt-2 text-gray-700">{{ $comment->created_at->diffForHumans() }}</p> 
                <!-- Add the Delete Button -->
        <form action="{{ route('comment.delete', $comment) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
            </div>
    @endforeach
            </div>
@else
            <div class="mt-16">
             <p class="text-gray-600">No comments</p>
            </div>
@endif

        </div>
    </div>
   
@endsection
