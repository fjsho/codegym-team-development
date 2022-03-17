<x-app-layout>
  <x-slot name="header"></x-slot>
  <article class="container max-w-3xl mx-auto px-10">
        <header class="flex flex-col px-24">
            <div class="w-2xl h-80 my-12">
                <x-eye-chacher src="/storage/attachment_pic/{{$post->attachment->attachment_pic_path}}"></x-eye-chacher>
            </div>
            <div class="pb-12">
              <x-input-nonborder class="text-3xl font-bold" value="{{$post->title}}" placeholder="タイトル" />
            </div>
        </header>
        <textarea class="w-full h-screen rounded-md text-base border-transparent bg-white py-16 px-20 mb-20 resize-none" placeholder="学習で成功した体験をレシピとして投稿してみませんか？">{{$post->content}}</textarea>
      </form>
  </article>
</x-app-layout>
