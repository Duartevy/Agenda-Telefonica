<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-8">
            <div class="card mt-3 p-4 modal-content">
                
                <form method="POST" action="/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control form-control-lg" value="{{ old('nome') }}" required>
                        @if ($errors->has('nome'))
                            <span class="text-danger">{{ $errors->first('nome') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="tel" maxlength="15" pattern="\(\d{2}\) \d{5}-\d{4}" placeholder="(xx) xxxxx-xxxx" name="telefone" class="form-control form-control-lg" value="{{ old('telefone') }}" required>
                        @if ($errors->has('telefone'))
                            <span class="text-danger">{{ $errors->first('telefone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Imagem:</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="imagem" class="custom-file-input" id="customFile" required>
                                <label class="custom-file-label text-color" for="customFile" data-browse="Selecionar" style="color: #03178C;">Escolher ficheiro</label>
                            </div>
                        </div>
                        @if ($errors->has('imagem'))
                            <span class="text-danger">{{ $errors->first('imagem') }}</span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
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
  max-width: 700px; /* Aumentado para dar mais espaço ao formulário */
}

.modal-title {
  color: #03178C; /* Azul */
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  text-align: left;
  color: #03178C; /* Cor azul para contrastar com o fundo */
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.custom-file-input {
  width: 100%;
  padding: 20px; /* Aumentado para inputs maiores */
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px; /* Texto maior */
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
  height: auto; /* Remove altura fixa para alinhar com os outros inputs */
  padding: 10px; /* Ajustar padding */
  margin-right: -1px; /* Remover a margem extra */
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
}

.custom-file-label.text-primary::after {
  color: #03178C; /
}

.btn-primary {
  background-color: #03178C;
  border: none;
  padding: 12px;
  font-size: 18px;
  width: 100%;
}

.btn-primary:hover {
  background-color: rgba(0, 0, 0, 0.7);
}
</style>
