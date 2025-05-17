<x-filament::page>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <form wire:submit.prevent="authenticate" class="bg-white p-8 rounded shadow w-96">
            {{ $this->form }}

            <x-filament::button type="submit" class="mt-4 w-full">
                Login
            </x-filament::button>
        </form>
    </div>
</x-filament::page>
