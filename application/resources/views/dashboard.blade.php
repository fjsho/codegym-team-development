<x-app-layout>
    <x-slot name="header">
        <!-- Validation Errors -->
        <x-flash-message />
        <x-validation-errors :errors="$errors" />
        <div class="flex max-w-full mt-8 ml-5 px-4 py-6 sm:px-6 lg:px-6">
            <div class="font-medium text-2xl text-black leading-tight">
                {{ __('Posts') }}
            </div>
        </div>

    <form method="GET" action="{{ route('dashboard') }}">
        <!-- Navigation -->
        <div class="flex max-w-full mx-auto px-4 py-6 sm:px-6 lg:px-6">
            <div class="md:w-1/3 px-3 mb-6 mr-6">
                <x-label for="key" :value="__('Keyword')" class="{{ $errors->has('keyword') ? 'text-red-600' :'' }} ml-3" />
                <x-input id="keyword" class="block mt-1 w-full {{ $errors->has('keyword') ? 'border-red-600' :'' }}" type="text" name="keyword" :value="$keyword" placeholder="TOEIC、簿記、ITパスポート" autofocus />
            </div>
            <div class="flex flex-wrap content-center">
                <x-button class="px-5">
                    {{ __('Search') }}
                </x-button>
            </div>
        </div>

        <div class="flex flex-col mx-6 mb-6 rounded">
            @if(0 < $posts->count())
                <div class="flex justify-start p-2">
                    {{ $posts->appends(request()->query())->links() }}
                </div>
                    <!-- 以下ソート用のタブ -->
                <!-- <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                            <th class="py-3 px-6 text-left">
                                @sortablelink('title', __('Post Title'))
                            </th>
                            <th class="py-3 px-6 text-left">
                                @sortablelink('name', __('Name'))
                            </th>
                            <th class="py-3 px-6 text-center">
                                @sortablelink('created_at', __('Created At'))
                            </th>
                            <th class="py-3 px-6 text-center">
                                @sortablelink('updated_at', __('Updated At'))
                            </th>
                            <th class="py-3 px-6 text-center"></th>
                        </tr>
                    </thead>
                </table> -->
                    <div class="text-gray-600 text-sm font-light">
                        <div class="flex flex-wrap justify-center">
                        @foreach($posts as $post)
                            <div class="group py-3 px-3 w-1/2">
                                <div class="rounded-2xl cursor-pointer bg-white " onclick="location.href='{{ route('posts.show', ['post' => $post->id]) }}'">
                                    <div class="py-3 px-6">
                                        <img class="group-hover:opacity-60 group-hover:duration-30 rounded-2xl w-full max-h-52 object-cover" @if($post->attachment) src="{{asset('storage/attachment_pic/'.$post->attachment->attachment_pic_path)}}" @endif alt="サムネイル">
                                    </div>
                                    <div class="py-3 px-6 text-left max-w-xs truncate">
                                        <a class="text-2xl font-medium text-gray-900 hover:text-gray-600" href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a> 
                                    </div>
                                    <div class="py-3 px-6 text-left max-w-xs truncate flex justify-start">
                                        <div class="px-3">
                                            <img class="rounded-full h-7" src="{{asset('storage/profile_pic/'.$post->user->profile_pic_path)}}">
                                        </div>
                                        <div class="self-center" >
                                            <a class="font-medium text-gray-900 hover:text-gray-600" href="{{ route('users.show', ['user' => $post->user->id]) }}">{{ $post->user->name }}</a> 
                                        </div>
                                    </div>
                                    <div class="py-3 px-6 text-left">
                                        <div>作成日:{{ $post->created_at->format('Y/m/d') }}</div>
                                        <div>更新日:{{ $post->updated_at->format('Y/m/d') }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                
                <div class="flex justify-start p-2">
                    {{ $posts->appends(request()->query())->links() }}
                </div>
                @endif
        </div>
    </form>

</x-app-layout>

