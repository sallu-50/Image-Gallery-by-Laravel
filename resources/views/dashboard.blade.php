<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hello, :User', ['User' => auth()->user()->name]) }}
        </h2>
    </x-slot>


    <div class="container px-4 py-8 mx-auto lg:px-8">
        <x-image-list :images="$images" />
    </div>


</x-app-layout>
