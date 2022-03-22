<x-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ url('css/index.css') }}">
    </x-slot>
    <h1>ListField</h1>
    <div id="app">
        <list-component :tasks="{{ $tasks }}"></list-component>
    </div>
</x-layout>
