<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-link href="{{ route('articles.create') }}" class="mb-4">Create</x-link>
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
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price(USD)
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price(EUR)
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($products)
                                @forelse($products as $product)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $product->id }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ number_format($product->price, 2) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $product->price_eur }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ __("Data does not exist!") }}
                                        </td>
                                    </tr>
                                @endforelse
                            @endisset
                            </tbody>
                        </table>
                        <div class="mt-4">
                            @isset($user)
                                {{ $articles->links('pagination::tailwind') }}
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

