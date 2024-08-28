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
        .form-container input[type="email"] {
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
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: rgba(0, 0, 0, 0.7); /* Cor de fundo preta transparente ao passar o mouse */
        }

    </style>

    <div class="center-container">
        <div class="form-container">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e nós lhe enviaremos um link de redefinição de senha que permitirá que você escolha uma nova.
                    ') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit">
                        {{ __('Link para redefinição de senha de e-mail') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
