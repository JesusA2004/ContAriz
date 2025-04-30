<template>
    <div class="register-page d-flex justify-content-center align-items-center">
      <div class="register-card p-4 shadow-sm">
        <h2 class="text-center mb-4">Crea tu cuenta <span class="sparkle">✨</span></h2>
        <form @submit.prevent="register" novalidate>
          <div class="mb-3">
            <label for="name" class="form-label">Nombre completo</label>
            <input
              v-model="name"
              type="text"
              id="name"
              class="form-control"
              placeholder="Tu nombre aquí"
              required
            />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input
              v-model="email"
              type="email"
              id="email"
              class="form-control"
              placeholder="usuario@ejemplo.com"
              required
            />
          </div>
          <div class="mb-3">
            <label for="rol" class="form-label">Tipo de usuario</label>
            <select v-model="rol" id="rol" class="form-select" required>
              <option disabled value="">Selecciona un rol</option>
              <option value="admin">Admin</option>
              <option value="empleado">Empleado</option>
              <option value="supervisor">Supervisor</option>
              <option value="user">Usuario</option>
            </select>
          </div>
          <div class="mb-3 position-relative">
            <label for="password" class="form-label">Contraseña</label>
            <div class="input-group">
              <input
                v-model="password"
                :type="inputType"
                id="password"
                class="form-control"
                placeholder="••••••••"
                required
                minlength="6"
              />
              <span class="input-group-text toggle" @click="togglePasswordVisibility">
                <i :class="iconClass"></i>
              </span>
            </div>
          </div>
          <div class="mb-3 position-relative">
            <label for="confirm" class="form-label">Confirma contraseña</label>
            <div class="input-group">
              <input
                v-model="password_confirmation"
                :type="inputType"
                id="confirm"
                class="form-control"
                placeholder="••••••••"
                required
                minlength="6"
              />
              <span class="input-group-text toggle" @click="togglePasswordVisibility">
                <i :class="iconClass"></i>
              </span>
            </div>
          </div>
          <button
            type="submit"
            class="btn btn-success w-100 btn-action"
            :disabled="isLoading"
          >
            <span v-if="!isLoading">Registrar</span>
            <span v-else class="spinner-border spinner-border-sm"></span>
          </button>
          <p v-if="errorMessage" class="alert alert-danger mt-3 mb-0">
            {{ errorMessage }}
          </p>
          <p v-if="successMessage" class="alert alert-success mt-3 mb-0">
            {{ successMessage }}
          </p>
        </form>
        <p class="text-center mt-4">
          ¿Ya tienes cuenta?
          <router-link to="/" class="link-login">Inicia sesión</router-link>
        </p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue'
  import axios from 'axios'
  import { useRouter } from 'vue-router'
  
  const name = ref('')
  const email = ref('')
  const rol = ref('')
  const password = ref('')
  const password_confirmation = ref('')
  const errorMessage = ref('')
  const successMessage = ref('')
  const isLoading = ref(false)
  const isPasswordVisible = ref(false)
  
  const inputType = computed(() => (isPasswordVisible.value ? 'text' : 'password'))
  const iconClass = computed(() => (isPasswordVisible.value ? 'bx bx-show' : 'bx bx-hide'))
  const togglePasswordVisibility = () => {
    isPasswordVisible.value = !isPasswordVisible.value
  }
  
  const router = useRouter()
  const registerUrl = process.env.VUE_APP_API_URL + '/auth/register'
  
  async function register() {
    errorMessage.value = ''
    successMessage.value = ''
    isLoading.value = true
  
    try {
      await axios.post(registerUrl, {
        name: name.value,
        email: email.value,
        rol: rol.value,
        password: password.value,
        password_confirmation: password_confirmation.value
      })
      successMessage.value = '¡Registro exitoso! Redirigiendo al login...'
      setTimeout(() => router.push('/'), 1500)
    } catch (err) {
      if (err.response && err.response.data.errors) {
        // muestra el primer error
        const errs = err.response.data.errors
        const firstKey = Object.keys(errs)[0]
        errorMessage.value = errs[firstKey][0]
      } else {
        errorMessage.value = 'Error en el registro. Intenta de nuevo.'
      }
    } finally {
      isLoading.value = false
    }
  }
  </script>
  
  <style lang="css" scoped>
  .register-page {
    height: 100vh;
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
    padding: 1rem;
  }
  
  .register-card {
    width: 100%;
    max-width: 400px;
    background: #fff;
    border-radius: 1rem;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }
  .register-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
  }
  
  h2 {
    font-weight: 600;
    color: #333;
  }
  
  .sparkle {
    display: inline-block;
    animation: sparkle 2s infinite;
  }
  @keyframes sparkle {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.1); }
  }
  
  .form-label {
    font-weight: 500;
    color: #444;
  }
  
  .input-group-text.toggle {
    background: transparent;
    border: none;
    cursor: pointer;
    color: #888;
    transition: color 0.3s;
  }
  .input-group-text.toggle:hover {
    color: #333;
  }
  
  .btn-action {
    padding: 0.6rem;
    font-size: 1.05rem;
    font-weight: 500;
    transition: background 0.3s, transform 0.2s;
  }
  .btn-action:hover:not(:disabled) {
    background: #1e7e34;
    transform: translateY(-2px);
  }
  .btn-action:disabled {
    opacity: 0.7;
  }
  
  .link-login {
    color: #155724;
    font-weight: 500;
    transition: color 0.3s;
  }
  .link-login:hover {
    color: #0b2e13;
    text-decoration: underline;
  }
  
  .alert {
    font-size: 0.9rem;
  }
  </style>
  