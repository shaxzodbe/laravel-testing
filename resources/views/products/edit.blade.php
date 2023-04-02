<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('articles.update', $article) }}">
                        @csrf
                        @method('PUT')

                        <div class="my-3 mt-0">
                            <x-label for="name" value="{{ __('Title') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="title" :value="$article->title" required autofocus autocomplete="title" />
                        </div>
                        <div class="my-3">
                            <x-label for="name" value="{{ __('Body') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="body" :value="$article->body" required autofocus autocomplete="body" />
                        </div>
                        <div class="my-3">
                            <x-label for="name" value="{{ __('Comment') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="comments" :value="$article->comments" required autofocus autocomplete="comments" />
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Task') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
