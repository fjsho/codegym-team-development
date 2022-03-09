<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>

    <form method="GET" action="{{ route('dashboard') }}">
        <!-- Validation Errors -->
        <x-flash-message />
        <x-validation-errors :errors="$errors" />

        <!-- Navigation -->
        <!-- 検索時のの条件分岐は未実装 -->
        
        <div class="flex max-w-full mx-auto px-4 py-6 sm:px-6 lg:px-6">
            <div class="md:w-1/3 px-3 mb-6 mr-6">
                <x-label for="key" :value="__('Keyword')" class="{{ $errors->has('keyword') ? 'text-red-600' :'' }}" />
                <x-input id="keyword" class="block mt-1 w-full {{ $errors->has('keyword') ? 'border-red-600' :'' }}" type="text" name="keyword" :value="$keyword" :placeholder="__('Keyword')" autofocus />
            </div>
            <div class="flex flex-wrap content-center">
                <x-button class="px-10">
                    {{ __('Search') }}
                </x-button>
            </div>
        </div>

        <div class="flex flex-col mx-6 mb-6 bg-white rounded">
            @if(0 < $posts->count())
                <div class="flex justify-start p-2">
                    {{ $posts->appends(request()->query())->links() }}
                </div>
                <table class="min-w-max w-full table-auto">
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
                </table>
                    <div class="text-gray-600 text-sm font-light">
                        <div class="flex flex-wrap justify-center">
                        @foreach($posts as $post)
                            <div class="py-3 px-6 w-2/6">
                                <div class="border-gray-200 rounded-2xl hover:bg-gray-100 cursor-pointer bg-gray-50 " onclick="location.href='{{ route('posts.edit', ['post' => $post->id]) }}'">
                                    <div class="py-3 px-6 text-left max-w-xs truncate">
                                        <a class="underline font-medium text-gray-600 hover:text-gray-900" href="{{ route('posts.edit', ['post' => $post->id]) }}">{{ $post->title }}</a> 
                                    </div>
                                    <div class="py-3 px-6 text-left max-w-xs truncate">
                                        <a class="underline font-medium text-gray-600 hover:text-gray-900" href="{{ route('posts.edit', ['post' => $post->id]) }}">{{ $post->user->name }}</a> 
                                    </div>
                                    <div class="py-3 px-6 text-center">
                                        <span>作成日:{{ $post->created_at->format('Y/m/d') }}</span>
                                        <span>更新日:{{ $post->updated_at->format('Y/m/d') }}</span>
                                    </div>
                                    <!-- <div class="py-3 px-6 text-center">

                                    </div> -->
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

