<x-guest-layout>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('/imagens/lista-telefonica.jpg'); /* Caminho para a imagem de fundo */
            background-size: cover;
            background-position: center;
        }

        /* Centralização do formulário */
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.7); /* Fundo escuro translúcido */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); /* Sombra mais forte */
            width: 100%;
            max-width: 400px; /* Ajuste no tamanho máximo da caixa do formulário */
            box-sizing: border-box; /* Inclui padding e border na largura total */
            color: #fff; /* Cor do texto branco */
        }

        form {
            width: 100%;
        }

        /* Estilo dos inputs */
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px; /* Diminui o padding dos inputs */
            margin-top: 1px; /* Diminui o espaço entre o input e o rótulo */
            border-radius: 1px;
            border: none;
            background-color: rgba(255, 255, 255, 0.2); /* Fundo dos inputs translúcido */
            color: #fff; /* Texto dos inputs branco */
        }

        /* Estilo dos rótulos */
        .form-container label {
            margin-bottom: 5px; /* Diminui o espaço entre o rótulo e o input */
        }

        /* Estilo dos botões */
        .form-container button {
            width: 100%;
            padding: 15px;
            margin-top: 10px; /* Diminui o espaço entre os botões */
            background-color: #03178C; /* Cor do botão */
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: url('caminho/para/o/cursor/preto.png'), auto; /* Cursor preto ao passar sobre os botões */
            transition: background-color 0.3s ease; /* Adiciona transição suave para o efeito de hover */
            style=cursor: pointer;
        }

        .form-container button:hover {
            background-color: rgba(0, 0, 0, 0.7); /* Cor de fundo preta transparente ao passar o mouse */
        }

        /* Link para login */
        .form-container .already-registered {
            color: #F2EEEB;
            text-decoration: none;
            display: block;
            margin-top: 20px; /* Ajuste no espaço superior do link */
            text-align: center; /* Centraliza o link */
            cursor: url('caminho/para/o/cursor/preto.png'), auto; /* Cursor preto ao passar sobre o link */
        }

        .form-container .already-registered:hover {
            text-decoration: underline;
        }

    </style>

    <div class="center-container">
        <div class="form-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="ms-3">
                        {{ __('Register') }}
                    </button>
                </div>

                <a class="already-registered" href="{{ route('login') }}">
                    {{ __('Já Registrado?') }}
                </a>
            </form>
        </div>
    </div>
</x-guest-layout>
