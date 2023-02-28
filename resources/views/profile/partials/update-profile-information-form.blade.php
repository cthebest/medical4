<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ trans('adminlte::adminlte.profile_information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("adminlte::adminlte.profile_information_desc") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <x-adminlte-input name="name" label="{{trans('adminlte::adminlte.username') }}" placeholder="Nombre de usuario"
                          fgroup-class="col-md-6" disable-feedback :value="old('name', $user->name)">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
            <x-input-bootstrap-error :messages="$errors->get('name')"></x-input-bootstrap-error>
        </x-adminlte-input>

        <x-adminlte-input name="email" type="email" label="{{trans('adminlte::adminlte.Email') }}"
                          placeholder="placeholder"
                          fgroup-class="col-md-6" disable-feedback :value="old('email', $user->email)">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </div>
            </x-slot>

            <x-input-bootstrap-error :messages="$errors->get('email')"></x-input-bootstrap-error>
        </x-adminlte-input>


        <div class="d-flex align-items-center">

            <x-adminlte-button label="{{trans('adminlte::adminlte.Save') }}" theme="primary" icon="fas fa-save"
                               type="submit"/>


            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm mb-0 text-success ml-1"
                >{{ __('adminlte::adminlte.Saved') }}</p>
            @endif

        </div>
    </form>
</section>
