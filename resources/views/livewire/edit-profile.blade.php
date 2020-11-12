{{-- Because she competes with no one, no one can compete with her. --}}
<x-app-layout>

    @section('title', 'Editar Perfil')
    <div>
        @section('content')

            <form wire:submit.prevent="updateUser">
                @csrf
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Nombre:') }}" />
                    <x-jet-input class="inline-block w-1/5" id="first_name" type="text"  name="first_name" wire:model="auth()->user()->first_name" :value="auth()->user()->first_name"  autofocus/>
                </div>
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Apellido:') }}" />
                    <x-jet-input class="inline-block w-1/5" id="first_name" type="text"  name="first_name" :value="auth()->user()->last_name"  autofocus/>
                </div>
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Email:') }}"  />
                    <x-jet-input class="inline-block w-1/5" id="first_name" type="email"  name="first_name" :value="auth()->user()->email"  autofocus/>
                </div>
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Contraseña:') }}" />
                    <x-jet-input class="inline-block w-1/5" id="first_name" type="password"  name="first_name" placeholder="**********"  autofocus/>
                </div>
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Fecha de Nacimiento:') }}" />
                    <x-jet-input class="inline-block w-1/5" id="first_name" type="date"  name="first_name" :value="auth()->user()->dob"  autofocus/>
                </div>

                @if(auth()->user()->role->slug == 'professional')
                    <div class="flex">
                        <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Profesión:') }}" />
                        <x-jet-input class="inline-block w-1/5" id="first_name" type="text"  name="first_name" :value="Maestro"  autofocus/>
                    </div>
                @endif
                <div class="mt-4">
                    <button type="submit" class="button button1">
                        {{ __('Salvar') }}
                    </button>
                </div>
            </form>
            </form>
        @endsection
    </div>
</x-app-layout>


