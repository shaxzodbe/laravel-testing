<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('create_article')
                <x-link href="{{ route('articles.create') }}" class="mb-4">Create</x-link>
            @endcan
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-auto">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Article title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Body
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Comments
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slug
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $article)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $article->id }}
                                        {{ $article->user->email }}
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $article->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ Str::limit($article->body, 20) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $article->comments }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ $article->slug }}"
                                           class="visited:text-purple-600">{{ $article->slug }}</a>
                                    </td>
                                    <td class="px-2 py-2">
                                        @can('edit_article')
                                            <x-link href="{{ route('articles.edit', $article) }}">Edit</x-link>
                                        @endcan
                                        @can('delete_article')
                                                <form method="POST" action="{{ route('articles.destroy', $article) }}"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button
                                                        type="submit"
                                                        onclick="return confirm('Are you sure?')">Delete
                                                    </x-danger-button>
                                                </form>
                                            @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ __("Data does not exist!") }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $articles->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

