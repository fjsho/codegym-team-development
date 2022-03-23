<x-app-layout>
    <x-slot name="header">
        <div class="flex py-12">
            <div class="flex-shrink-0 w-32 h-32">
                @section('script')
                <script>
                    let file = document.getElementById('file');
                    file.addEventListener('change', function(event){
                        const file = event.target.files[0];
                
                        if(typeof event.target.files[0] !== 'undefined') {
                            document.forms['uploadform'].submit();
                        } else {
                            // @fixme ほんとはファイルアップロード失敗時の処理も書いておくといいが省略
                        }
                    }, false);
                </script>
                @endsection
                
                <x-app-layout>
                    <x-slot name="header"></x-slot>
                    <!-- Validation Errors -->
                    <x-flash-message />
                    <x-validation-errors :errors="$errors" />
                    <article class="w-screen max-w-4xl mx-auto px-10">
                        <div class="flex flex-col px-24">
                            <form name="uploadform" method="POST" action="{{ route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                            <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
                                @csrf
                                @method('PUT')
                                <div class="px-24">
                                    <x-textarea name="title" class="w-full bg-transparent text-3xl font-bold leading-10" value="{{$post->title}}" placeholder="タイトル"  rows="2" maxlength="255"/>
                                </div>
                                <x-textarea name="content" class="w-full h-screen bg-white py-16 px-20 mb-20" :value="old('content', $post->content)" placeholder="学習で成功した体験をレシピとして投稿してみませんか？" maxlength="10000" />
                            </form>
                        </div>
                    </article>
                </x-app-layout>          <x-profile-pic src="/storage/profile_pic/{{$profile->profile_pic_path}}"></x-profile-pic>
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
