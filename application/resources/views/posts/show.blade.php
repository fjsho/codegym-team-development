<x-app-layout>
    <x-slot name="header"></x-slot>
    <article class="max-w-4xl mx-auto px-10">
        <header class="flex flex-col px-24">
            <div class="w-2xl h-80 py-12">
                {{-- @todo 画像表示方法の確認→修正 --}}
                <x-eye-chacher src="{{$post->attachment->attachment_pic_path}}"></x-eye-chacher>
            </div>
            <h1 class="pb-12 text-3xl font-bold">{{$post->title}}</h1>
            <div class="flex pb-12">
                <div class="flex-shrink-0 w-8 h-8">
                    <x-profile-pic src="/storage/profile_pic/{{$post->user->profile_pic_path}}"></x-profile-pic>
                </div>
                <div class="pl-2">
                    <p class="text-xs">{{$post->user->name}}</p>
                    <p class="text-xs">{{$post->updated_at}}</p>
                </div>
            </div>
        </header>
        <div class="rounded-md border-transparent bg-white py-16 px-20">
            {{$post->content}}
        </div>
    </article>
</x-app-layout>
