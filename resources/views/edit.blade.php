<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Agenda telefônica</title>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link btn btn-primary text-light" href="/">Index</a>
        </li>
    </ul>
</nav>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>            
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-8">
            <div class="card mt-3 p-4 modal-content">
                <h3 class="modal-title text-center">Atualização do Contato {{ $agenda->nome }}</h3>
                <form method="POST" action="{{ route('update', $agenda->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control form-control-lg" value="{{ old('nome', $agenda->nome) }}" required>
                        @if ($errors->has('nome'))
                            <span class="text-danger">{{ $errors->first('nome') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="tel" maxlength="15" pattern="\(\d{2}\) \d{5}-\d{4}" placeholder="(xx) xxxxx-xxxx" name="telefone" class="form-control form-control-lg" value="{{ old('telefone', $agenda->telefone) }}" required>
                        @if ($errors->has('telefone'))
                            <span class="text-danger">{{ $errors->first('telefone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email', $agenda->email) }}" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Foto:</label>
                        @if ($agenda->imagem)
                            <img src="{{ asset('imagens/' . $agenda->imagem) }}" class="rounded-circle" width="50" height="50" alt="Imagem Atual" style="display: block; margin-bottom: 10px;">
                            <p>Nome da imagem: {{ $agenda->imagem }}</p>
                            <input type="hidden" name="imagem_atual" value="{{ $agenda->imagem }}">
                        @endif
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="imagem" class="custom-file-input" id="customFile">
                                <label class="custom-file-label text-color" for="customFile" data-browse="Selecionar" style="color: #03178C;">Escolher ficheiro</label>
                            </div>
                        </div>
                        @if ($errors->has('imagem'))
                            <span class="text-danger">{{ $errors->first('imagem') }}</span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style scoped>
.modal-content {
    background-color: #fff;
    width: 100%; 
    max-width: 700px;
}
body {
    background-image: url('/imagens/lista-telefonica.jpg'); /* Defina o caminho correto para a imagem */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    font-family: 'Lato', sans-serif;
    color: #03178C;
    text-shadow: 1px 1px 2px #000000;
    }
.modal-title {
    color: #03178C;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra no título */
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    text-align: left;
    color: #03178C;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4); /* Sombra nos labels */
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"] {
    width: 100%;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: black; /* Texto preto dentro dos inputs */
    text-shadow: none; /* Remove sombra do texto */
}

.input-group {
    display: flex;
    align-items: center;
}

.custom-file {
    display: flex;
    align-items: center;
    width: 100%;
}

.custom-file-input {
    flex: 1;
    height: auto;
    padding: 10px;
    margin-right: -1px;
}

.custom-file-label {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4); /* Sombra na label customizada */
}

.custom-file-label.text-primary::after {
    color: #03178C;
}

.btn-primary {
    background-color: #03178C;
    border: none;
    padding: 12px;
    font-size: 18px;
    width: 100%;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra no botão */
}

.btn-primary:hover {
    background-color: rgba(0, 0, 0, 0.7);
}

.nav-link.btn {
    padding: 10px 20px;
    font-size: 18px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra no botão Index */
}
</style>

</body>
</html>
