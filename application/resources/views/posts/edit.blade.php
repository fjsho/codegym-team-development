<x-app-layout>
    <x-slot name="header"></x-slot>
    <article class="w-screen max-w-4xl mx-auto px-10">
        <div class="flex flex-col px-24">
            <form action="">
                @csrf
                <div class="w-2xl my-12">
                    <label for="file">アップロードテスト</label>
                    @if($pic_exist)
                        <x-eye-chacher src="/storage/attachment_pic/{{ $post->attachment->attachment_pic_path }}" alt="サムネイル" for="attachment_pic_upload" class="h-80"></x-eye-chacher>
                    @else
                        <x-upload-icon for="attachment_pic_upload" class="w-12 h-12"></x-upload-icon>
                    @endif
                    <input type="file" name="attachment_pic_upload" id="attachment_pic_upload">
                </div>
            </form>
        </div>
        <div class="w-full">
            <form method="POST" action="{{route('posts.update', ['post' => $post])}}">
                @csrf
                @method('PUT')
                <div class="px-24">
                    <x-textarea name="title" class="w-full bg-transparent text-3xl font-bold leading-10" value="{{$post->title}}" placeholder="タイトル"  rows="2" maxlength="255"/>
                </div>
                <x-textarea name="content" class="w-full h-screen bg-white py-16 px-20 mb-20" :value="old('content', $post->content)" placeholder="学習で成功した体験をレシピとして投稿してみませんか？" maxlength="1000" autofocus />
                <x-submit-button-main>テスト</x-submit-button-main>
            </form>
        </div>
    </article>
</x-app-layout>
