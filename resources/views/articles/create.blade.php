<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('articles.store') }}">
                        @csrf

                        <div class="my-3 mt-0">
                            <x-label for="title" value="{{ __('Title') }}" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                        </div>
                        <div class="my-3">
                            <x-label for="body" value="{{ __('Body') }}" />
                            <x-input id="body" class="block mt-1 w-full" type="text" name="body" :value="old('body')" required autofocus autocomplete="body" />
                        </div>
                        <div class="my-3">
                            <x-label for="comments" value="{{ __('Comments') }}" />
                            <x-input id="comments" class="block mt-1 w-full" type="text" name="comments" :value="old('comments')" required autofocus autocomplete="comments" />
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Article') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
