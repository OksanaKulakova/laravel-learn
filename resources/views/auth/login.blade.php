@section('title', 'Вход')

<x-guest-layout>
    <x-alerts.error />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">

                <x-input.group for="email" label="Электронная почта">
                    <x-input.email name="email" placeholder="Электронная почта" value="{{ old('email') }}"/>
                </x-input.group>

                <x-input.group for="password" label="Пароль">
                    <x-input.password name="password" placeholder="Пароль" value="{{ old('password') }}"/>
                </x-input.group>

                <x-input.checkbox name="remember_me" label="Запомнить меня" value="{{ old('remember_me') }}"/>

                <x-input.group>
                    <x-input.button-orange type="submit" text="Вход"/>
                </x-input.group>
            </div>
        </div>
    </form>
</x-guest-layout>
