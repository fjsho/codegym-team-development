<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <!-- Page Content -->
        <main class="md:flex">
            <div class="md:flex flex-col md:flex-row md:min-h-screen">
            </div>
            <div class="md:flex flex-col w-full">

                <div>
                    <div class="my-auto">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <P><strong>（進捗報告）</strong></P>
                                <p><strong>（相談したいこと）</strong></p>
                                <ul class="list-disc pl-8">
                                </ul>
                            </div>
                            <div class="flex flex-wrap justify-between mx-4 bg-gray-100">
                                <div class="px-4 mb-8">
                                    <h2 class="font-semibold text-xl">ヘッダー</h2>
                                    <p>ロゴ</p>
                                    <x-application-logo class="w-8 h-8"/>？？
                                    <p>プロフィール画像表示枠</p>
                                    <x-profile-pic src="storage/profile_pic/dummy_profilepic.png" alt="" class="w-10 h-10" />
                                    <p>会員登録画面へのリンク</p>
                                    <x-link-button-main href="#">会員登録</x-link-button-main>
                                    <p>新規投稿画面へのリンク</p>
                                    <x-link-button-main href="#">投稿する</x-link-button-main>
                                </div>
                                <div class="px-4 mb-8">
                                    <h2 class="font-semibold text-xl">新着レシピ一覧</h2>
                                    <p>レシピのサムネ表示枠</p>
                                    <x-eye-chacher src="storage/profile_pic/Rectangle.png" alt="" />
                                    <p>投稿者画像表示枠</p>
                                    <x-profile-pic src="storage/profile_pic/dummy_profilepic.png" alt="" class="w-10 h-10" />
                                </div>
                                <div class="px-4 mb-8">
                                    <h2 class="font-semibold text-xl">ログイン画面</h2>
                                    <p>テキストボックス</p>
                                    <x-input />
                                    <p>ログインボタン</p>
                                    <x-submit-button-main href="#">ログイン</x-submit-button-main>
                                </div>
                                <div class="px-4 mb-8">
                                    <h2 class="font-semibold text-xl">ユーザー登録画面</h2>
                                    <p>テキストボックス</p>
                                    <x-input />
                                    <p>登録ボタン</p>
                                    <x-submit-button-main href="#">登録する</x-submit-button-main>
                                </div>
                                <div class="px-4 mb-8">
                                    <h2 class="font-semibold text-xl">レシピ閲覧画面</h2>
                                    <p>投稿者画像表示枠</p>
                                    <x-profile-pic src="storage/profile_pic/dummy_profilepic.png" alt="" class="w-10 h-10" />
                                    <p>レシピのサムネ表示枠</p>
                                    <x-eye-chacher src="storage/profile_pic/Rectangle.png" alt="" />
                                </div>
                                <div class="px-4 mb-8">
                                    <h2 class="font-semibold text-xl">レシピ投稿画面</h2>
                                    <x-textarea class="h-4/5" value="レシピ投稿画面"></x-textarea>
                                </div>
                                <div class="px-4 mb-8">
                                    <h2 class="font-semibold text-xl">プロフィール表示画面</h2>
                                    <p>プロフィール表示枠</p>
                                    <x-profile-pic src="storage/profile_pic/dummy_profilepic.png" alt="" class="w-20 h-20" />
                                    <div>ボタン群
                                        <p>プロフィール編集画面へのリンク</p>
                                        <x-link-button-gray href="#">プロフィール編集</x-link-button-gray>
                                        <p>フォロー解除</p>
                                        <x-follow-button>フォロー中</x-follow-button>
                                        <p>フォローする</p>
                                        <x-unfollow-button>フォロー</x-unfollow-button>
                                        {{-- <x-upload-icom class="h-20 w-20 bg-red-500">アイコン</x-upload-icom> --}}
            
                                    </div>
                                </div>
                                <div class="px-4 mb-8">
                                    <h2 class="font-semibold text-xl">プロフィール編集画面</h2>
                                    <p>プロフィール表示枠</p>
                                    <x-profile-pic src="storage/profile_pic/dummy_profilepic.png" alt="" class="w-20 h-20" />
                                    <p>編集内容保存ボタン</p>
                                    <p>ユーザー名編集テキストボックス</p>
                                    <x-input-nonborder />
                                    <p>自己紹介編集テキストボックス</p>
                                    <x-textarea value="自己紹介" rows="4"></x-textarea>
                                    <p>プロフィール編集保存ボタン</p>
                                    <x-submit-button-gray href="#">プロフィール保存</x-submit-button-gray>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </main>
    </div>
    @yield('script')
</body>
</html>
