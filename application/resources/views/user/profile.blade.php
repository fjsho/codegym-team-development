<x-app-layout>
    <x-slot name="header">
        <div class="flex py-12">
            <div class="flex-shrink-0 w-32 h-32">
                <x-profile-pic src="/storage/profile_pic/{{$profile->profile_pic_path}}"></x-profile-pic>
            </div>
            <div class="w-full pt-4 pl-7">
                <div class="flex justify-between">
                    <div class="pb-6 text-xl">
                        <p>{{$profile->name}}</p>
                    </div>
                    <div>
                        @if ($user->id === $profile->id)
                        {{-- @TODO プロフィール編集画面完成後、リンクを差し替える --}}
                            <x-link-button-gray href="{{ route('users.show', ['user' => $user->id])}}">プロフィール編集</x-link-button-gray>
                        {{-- @TODO フォロー機能追加後、ボタンにそれぞれ機能を付与する --}}
                        @elseif ($user->following->contains('id', $profile->id))
                            <x-unfollow-button>フォロー中</x-unfollow-button>
                        @else
                            <x-follow-button>フォロー</x-follow-button>
                        @endif
                    </div>
                </div>
                <div class="text-sm">
                    <p>{{$profile->self_introduction}}</p>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
