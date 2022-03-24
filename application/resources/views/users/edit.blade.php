@section('script')
<script>
    let file = document.getElementById('file');
    file.addEventListener('change', function(event){
        const file = event.target.files[0];

        if(typeof event.target.files[0] !== 'undefined') {
            document.forms['update'].submit();
        } else {
            // @fixme ほんとはファイルアップロード失敗時の処理も書いておくといいが省略
        }
    }, false);
</script>
@endsection

<x-app-layout>
    <x-slot name="header">
        <!-- Validation Errors -->
        <x-flash-message />
        <x-validation-errors :errors="$errors" />

        <h1 class="py-6 px-6 text-3xl leading-10">アカウント設定</h1>
        <form name="update" method="POST" action="{{ route('users.update', ['user' => $profile->id ]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex py-4">
                <div class="flex-shrink-0 w-32 h-32">
                    <label for="file">
                        @if($profile->profile_pic_path)
                            <x-profile-pic src="{{ asset('storage/profile_pic/'.$profile->profile_pic_path)}}" alt="プロフィール画像" class="cursor-pointer" />
                        @else
                            <x-upload-icon class="cursor-pointer" />
                        @endif
                    </label>
                    <input type="file" name="file" id="file" class="hidden">
                </div>
                <div class="w-full pt-4 pl-7">
                    <div class="flex justify-between">
                        <div class="pb-6 text-xl flex-grow">
                            <x-label>表示名</x-label>
                            <x-input name="name" class="w-full" value="{{$profile->name}}" />
                        </div>
                        <div class="px-6 my-auto">
                            <x-submit-button-main>更新する</x-submit-button-main>
                        </div>
                    </div>
                    <div class="text-sm">
                        <x-label>自己紹介</x-label>
                        <x-textarea class="w-full" name="self_introduction" :value="old('self_introduction', $profile->self_introduction)" rows="3"/>
                    </div>
                </div>
            </div>
        </form>
        {{-- @todo 退会機能の実装 --}}
        {{-- <div>
            <x-submit-button-gray>退会する</x-submit-button-gray>
        </div> --}}
    </x-slot>
</x-app-layout>
