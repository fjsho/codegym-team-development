<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center ml-5">
                    <a href="{{ route('dashboard') }}">
                        <img src="/images/logo.png" width="120" alt="ロゴの名前" >
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden min-w-max w-80 right-10 px-6 py-4 sm:block">
                <form method="POST" action="{{ route('logout') }}">
                    <div class="flex justify-around items-center">
                        @csrf
                        <!-- ログインしている時 -->
                        @auth
                            <a href="{{ route('logout') }}" class="text-sm text-black"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">ログアウト
                            </a>
                            <div>
                                <a href="{{ route('users.show', ['user' => Auth::user()->id ]) }}">
                                    <x-profile-pic class="w-9 h-9" src="{{ asset('storage/profile_pic/'.Auth::user()->profile_pic_path)}}" />
                                </a>
                            </div>

                            <!-- レシピ投稿画面にいる時 -->
                            @if (Route::is('posts.create'))
                                <x-submit-button-main form="post">公開する</x-submit-button-main>
                            @elseif (Route::is('posts.edit'))
                                <x-submit-button-main form="update">更新する</x-submit-button-main>
                            @else
                                <x-link-button-main  href="{{ route('posts.create') }}">投稿する</x-link-button-main>
                            @endif
                        @endauth
                        <!-- ログインしていない時 -->
                        @guest
                            <a href="{{ route('login') }}" class="text-sm text-black">ログイン</a>
                            <x-link-button-main  href="{{ route('register') }}">会員登録</x-link-button-main>
                        @endguest
                    </div>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
