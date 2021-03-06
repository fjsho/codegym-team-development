<x-app-layout>
    <x-slot name="header"></x-slot>
    <article class="max-w-4xl mx-auto px-10">
        <div class="flex flex-col px-24">
            <div class="w-2xl my-12">
                @if($post->attachment)
                    <x-eye-chacher src="/storage/attachment_pic/{{$post->attachment->attachment_pic_path}}" class="h-80 mx-auto" />
                @else
                    {{-- @todo ほんとはダミー画像を入れたいところ --}}
                    <x-upload-icon class="w-12 h-12" />
                @endif
            </div>
            <h1 class="pb-12 text-3xl font-bold">{{$post->title}}</h1>
            <div class="flex pb-12">
                <div class="flex-shrink-0 w-8 h-8">
                    <x-profile-pic src="/storage/profile_pic/{{$post->user->profile_pic_path}}"></x-profile-pic>
                </div>
                <div class="pl-2">
                    <p class="text-xs">{{$post->user->name}}</p>
                    <p class="text-xs text-gray-500">
                        @if ($interval->days < 1 && $interval->h === 0)
                            {{$interval->i}}分前
                        @elseif ($interval->days < 1)
                            {{$interval->h}}時間前
                        @else
                            {{$post->updated_at->format('Y年m月d日')}}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="rounded-md border-transparent bg-white py-16 px-20 mb-20">
            {{$post->content}}
        </div>
    </article>
</x-app-layout>
