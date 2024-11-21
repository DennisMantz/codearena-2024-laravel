@extends('layouts.app')

@section('content')
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From the blog</h2>
        </div>
        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse ($posts as $post)
                <x-post :post="$post" />
            @empty
                <p class="text-center text-gray-500 col-span-full">No posts found.</p>
            @endforelse
        </div>
        <div class="mt-24">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@if($authors->isNotEmpty())
    <section id="authors" class="bg-gray-100 pb-10">
        <div class="mx-auto px-4">
            <h3 class="text-xl font-bold mb-10 pt-5">Authors</h3>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($authors as $author)
                    <li class="mt-[-20px]">
                        {{ $author->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif


@endsection

