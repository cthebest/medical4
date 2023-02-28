<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('adminlte::adminlte.update_password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('adminlte::adminlte.update_password_desc') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <x-adminlte-input name="current_password" type="password"
                          label="{{trans('adminlte::adminlte.current_password') }}"
                          fgroup-class="col-md-6" disable-feedback>

            <x-input-bootstrap-error
                :messages="$errors->updatePassword->get('current_password')">

            </x-input-bootstrap-error>
        </x-adminlte-input>

        <x-adminlte-input name="password" type="password"
                          label="{{trans('adminlte::adminlte.new_password') }}"
                          fgroup-class="col-md-6" disable-feedback>
            <x-input-bootstrap-error
                :messages="$errors->updatePassword->get('password')"></x-input-bootstrap-error>
        </x-adminlte-input>

        <x-adminlte-input name="password_confirmation" type="password"
                          label="{{trans('adminlte::adminlte.password_confirmation') }}"
                          fgroup-class="col-md-6" disable-feedback>
            <x-input-bootstrap-error
                :messages="$errors->updatePassword->get('password_confirmation')"></x-input-bootstrap-error>
        </x-adminlte-input>

        <div class="flex items-center gap-4">
            <x-adminlte-button label="{{trans('adminlte::adminlte.Save') }}" theme="primary" icon="fas fa-save"
                               type="submit"/>
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
