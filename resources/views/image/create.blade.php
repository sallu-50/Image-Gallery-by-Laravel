<x-app-layout title="Add Image">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('store.image') }}" method="post" enctype="multipart/form-data"
                    class="p-6 space-y-5 text-gray-900">
                    @csrf
                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input name="title" id="title" class="w-full mt-2" :value="old('title')" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="textarea"
                            class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            rows="4" placeholder="Enter your text here..." name="description" id="description"
                            :value="old('description')"></textarea>


                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="image" :value="__('Image')" />

                        <input type="file" name="image" id="image" class="w-full mt-2">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div>
                        <x-primary-button class="justify-center w-full">Save Image</x-primary-button>
                    </div>

                </form>
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
