<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Control Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <a href="#" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center cursor-pointer">
                    <span class="text-xl font-semibold">Home</span>
                </a>
                <a href="#" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center cursor-pointer">
                    <span class="text-xl font-semibold">About</span>
                </a>
                <a href="{{ route('experiences.index') }}" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center cursor-pointer">
                    <span class="text-xl font-semibold">Experiences</span>
                </a>
                <a href="{{ route('academics.index') }}" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center cursor-pointer">
                    <span class="text-xl font-semibold">Academics</span>
                </a>
                <a href="#skills" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center cursor-pointer">
                    <span class="text-xl font-semibold">Skills</span>
                </a>
                <a href="#projects" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center cursor-pointer">
                    <span class="text-xl font-semibold">Projects</span>
                </a>
                <a href="#contact" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center cursor-pointer">
                    <span class="text-xl font-semibold">Contact</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
