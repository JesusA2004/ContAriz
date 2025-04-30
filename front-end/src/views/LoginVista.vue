<template>
    <div class="login-page d-flex justify-content-center align-items-center">
      <div class="login-card p-4 shadow-sm">
        <h2 class="text-center mb-4">Ingresa a tu cuenta <span class="wave">👋</span></h2>
        <form @submit.prevent="login" novalidate>
          <div class="mb-3 position-relative">
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
              />
              <span class="input-group-text password-toggle" @click="togglePasswordVisibility">
                <i :class="iconClass"></i>
              </span>
            </div>
          </div>
          <button
            type="submit"
            class="btn btn-primary w-100 btn-login d-flex justify-content-center align-items-center"
            :disabled="isLoading"
          >
            <span v-if="!isLoading">Ingresar</span>
            <span v-else class="spinner-border spinner-border-sm"></span>
          </button>
          <p v-if="errorMessage" class="alert alert-danger mt-3 mb-0">
            {{ errorMessage }}
          </p>
        </form>
        <p class="text-center mt-4">
          ¿Aún no tienes cuenta?
          <router-link to="/registrar" class="register-link">Crea una gratis</router-link>
        </p>
      </div>
    </div>
</template>
  
<script setup>
    import { ref, computed } from 'vue'
    import axios from 'axios'
    
    const isPasswordVisible = ref(false)
    const inputType = computed(() => (isPasswordVisible.value ? 'text' : 'password'))
    const iconClass = computed(() => (isPasswordVisible.value ? 'bx bx-show' : 'bx bx-hide'))
    
    const togglePasswordVisibility = () => {
        isPasswordVisible.value = !isPasswordVisible.value
    }
    
    const email = ref('')
    const password = ref('')
    const errorMessage = ref('')
    const isLoading = ref(false)
    
    const loginUrl = process.env.VUE_APP_API_URL + '/auth/login'
    
    const login = async () => {
      
        isLoading.value = true
        errorMessage.value = ''
    
        try {
          const { data } = await axios.post(loginUrl, {
              email: email.value,
              password: password.value
          })
          localStorage.setItem('token', data.access_token)
          localStorage.setItem('token_type', data.token_type)
          window.location.href = '/home'
        } catch (err) {
          if (err.response) {
              errorMessage.value = err.response.data.error || 'Datos de acceso incorrectos. Por favor, verifica tus credenciales.'
          } else {
              errorMessage.value = 'Error de red. Por favor, intenta más tarde.'
          }
          } finally {
          isLoading.value = false
        }
    }
</script>
  
<style lang="css" scoped>

  .login-page {
    height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 1rem;
  }
  
  .login-card {
    width: 100%;
    max-width: 380px;
    background: #fff;
    border-radius: 1rem;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }

  .login-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  }
  
  h2 {
    font-weight: 600;
    color: #333;
  }
  
  .wave {
    display: inline-block;
    animation: wave 1.5s infinite;
  }

  @keyframes wave {
    0%, 60%, 100% { transform: rotate(0deg); }
    30% { transform: rotate(15deg); }
    50% { transform: rotate(-10deg); }
  }
  
  .form-label {
    font-weight: 500;
    color: #555;
  }
  
  .input-group-text.password-toggle {
    background: transparent;
    border: none;
    cursor: pointer;
    color: #888;
    transition: color 0.3s;
  }

  .input-group-text.password-toggle:hover {
    color: #333;
  }
  
  .btn-login {
    background: #667eea;
    border: none;
    padding: 0.6rem;
    font-size: 1.05rem;
    font-weight: 500;
    transition: background 0.3s, transform 0.2s;
  }

  .btn-login:hover:not(:disabled) {
    background: #5a67d8;
    transform: translateY(-2px);
  }

  .btn-login:disabled {
    opacity: 0.7;
  }
  
  .register-link {
    color: #764ba2;
    font-weight: 500;
    transition: color 0.3s;
  }

  .register-link:hover {
    color: #667eea;
    text-decoration: underline;
  }
  
  .alert {
    font-size: 0.9rem;
  }

</style>
  