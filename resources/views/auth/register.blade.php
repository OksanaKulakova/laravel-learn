@section('title', 'Регистрация')

<x-guest-layout>
    <x-alerts.error />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-input.group for="name" label="Имя">
                    <x-input.text name="name" placeholder="Имя" value="{{ old('name') }}"/>
                </x-input.group>

                <x-input.group for="email" label="Электронная почта">
                    <x-input.email name="email" placeholder="Электронная почта" value="{{ old('email') }}"/>
                </x-input.group>

                <x-input.group for="password" label="Пароль">
                    <x-input.password name="password" placeholder="Пароль" value="{{ old('password') }}"/>
                </x-input.group>

                <x-input.group for="password_confirmation" label="Подтверждение пароля">
                    <x-input.password name="password_confirmation" placeholder="Подтверждение пароля" value="{{ old('password') }}"/>
                </x-input.group>

                <x-input.group>
                    <x-input.button-orange type="submit" text="Зарегистрироваться"/>
                </x-input.group>
            </div>
        </div>
    </form>
</x-guest-layout>
