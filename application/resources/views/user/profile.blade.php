<x-app-layout>
    <div>
        <div class="mx-auto px-3 max-w-xl bg-white">
            <div class="flex flex-col mx-auto overflow-hidden">
                <div class="flex justify-between items-end mx-3 py-3">
                    <div>
                        <img src="{{$profile->profile_pic_path}}" alt="profile_pic" class="w-28 h-28 bg-blue-400">
                    </div>
                    <div>
                        @if ($user->id === $profile->id)
                            <x-link-button>プロフィール編集</x-link-button>
                        @elseif ($user->following->id === $profile->id)
                            <x-button>フォロー中</x-button>
                        @else
                            <x-button>フォロー</x-button>
                        @endif
                    </div>
                </div>
                <div class="pb-6 text-xl">
                    <p>{{$profile->name}}</p>
                </div>
                <div class="text-sm">
                    <p>{{$profile->self_introduction}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
