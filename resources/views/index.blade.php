<x-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ url('css/index.css') }}">
    </x-slot>
    <h1>ListField</h1>
    <div id="app">
        <tasks-component :tasks="{{ $tasks }}"></tasks-component>
    </div>
</x-layout>
