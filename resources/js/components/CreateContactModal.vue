<template>
  <div>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true" v-if="showModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center w-100" id="createModalLabel">Criar Novo Contato</h5>
            <button type="button" class="close" @click="closeModal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="name" class="d-block">Nome:</label>
                <input type="text" class="form-control" id="name" placeholder="Digite o nome">
              </div>
              <div class="form-group">
                <label for="phone" class="d-block">Telefone:</label>
                <input type="text" class="form-control" id="phone" placeholder="Digite o telefone">
              </div>
              <div class="form-group">
                <label for="email" class="d-block">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Digite o email">
              </div>
              <div class="form-group">
                <label for="image" class="d-block">Imagem:</label>
                <input type="file" class="form-control-file" id="image">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      showModal: false,
      modalContent: ''
    };
  },
  methods: {
    openModal() {
      this.showModal = true;
      this.$nextTick(() => {
        $('#createModal').modal('show');
      });
      this.loadModalContent();
    },
    closeModal() {
      this.showModal = false;
      $('#createModal').modal('hide');
    },
    loadModalContent() {
      axios.get('/create')
        .then(response => {
          this.modalContent = response.data;
        })
        .catch(error => {
          console.error('Error loading modal content:', error);
        });
    }
  }
};
</script>

<style scoped>
.modal-content {
  background-color: #fff;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  text-align: left; /* Garante que o texto esteja alinhado à esquerda */
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="file"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.btn-primary {
  background-color: #03178C;
  border: none;
  padding: 10px;
  font-size: 16px;
}

.btn-primary:hover {
  background-color: rgba(0, 0, 0, 0.7);
}
</style>
