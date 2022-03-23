<x-app-layout>
    <x-slot name="header"></x-slot>
    <!-- Validation Errors -->
    <x-flash-message />
    <x-validation-errors :errors="$errors" />
    <article class="w-screen max-w-4xl mx-auto px-10">
        <div class="flex flex-col px-24">
            <form name="uploadform" method="POST" action="{{ route('posts.create', ['post' => $post->id, 'attachment_file' => $post->attachment ]) }}" enctype="multipart/form-data">
                @csrf
                <div class="w-2xl my-12">
                    <label for="file">
                    @if($pic_exist)
                        <x-eye-chacher src="{{ asset('storage/attachment_pic/'.$post->attachment->attachment_pic_path)}}" alt="サムネイル" class="h-80 mx-auto cursor-pointer" />
                    @else
                        <x-upload-icon class="w-12 h-12 cursor-pointer" />
                    @endif
                    </label>
                    <input type="file" name="file" id="file" class="hidden">
                </div>
            </form>
        </div>
        <div class="w-full">
            <form method="POST" action="{{ route('posts.store', ['post' => $post]) }}">
                @csrf
                <div class="px-24">
                    <x-textarea name="title" class="w-full bg-transparent text-3xl font-bold leading-10" value="{{$post->title}}" placeholder="タイトル"  rows="2" maxlength="255"/>
                </div>
                <x-textarea name="content" class="w-full h-screen bg-white py-16 px-20 mb-20" :value="old('content', $post->content)" placeholder="学習で成功した体験をレシピとして投稿してみませんか？" maxlength="10000" />
            </form>
        </div>
    </article>
</x-app-layout>
