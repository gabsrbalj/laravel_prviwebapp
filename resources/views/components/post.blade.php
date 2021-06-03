
@props(['post' => $post])

<div>
    <div class="mb-4">
        <a href="{{  route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
        <span class="text-gray-600 text-sm">{{ $post->created_at->toTimeString() }}</span>

        <p class="mb-2">{{ $post->body }}</p>
    </div>

    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Sviđa mi se</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Ne sviđa mi se</button>
                </form>
            @endif
                @can('delete', $post)
                <form action="{{ route('posts.destroy',$post) }}" method="post">
                    @csrf
                    @method ('DELETE')
                    <button type="submit" class="text-blue-500">Obriši</button>
                </form>
                @endcan
        @endauth

        <span>{{ $post->likes->count() }} {{ 'oznaka sviđa mi se' }}</span>
    </div>
</div>
