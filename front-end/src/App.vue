<template>
  <div>
    <nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Offcanvas Navbar</a>
        <button 
          class="navbar-toggler" 
          type="button" 
          data-bs-toggle="offcanvas" 
          data-bs-target="#offcanvasNavbar" 
          aria-controls="offcanvasNavbar" 
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div 
          class="offcanvas offcanvas-end" 
          tabindex="-1" 
          id="offcanvasNavbar" 
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
            <button 
              type="button" 
              class="btn-close" 
              data-bs-dismiss="offcanvas" 
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" to="/">Inicio</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/enlace">Otro enlace</router-link>
              </li>
              <li class="nav-item dropdown">
                <a 
                  class="nav-link dropdown-toggle" 
                  href="#" 
                  role="button" 
                  data-bs-toggle="dropdown" 
                  aria-expanded="false"
                >
                  Opciones
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Acción</a></li>
                  <li><a class="dropdown-item" href="#">Otra acción</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Algo más aquí</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex mt-3" role="search">
              <input 
                class="form-control me-2" 
                type="search" 
                placeholder="Buscar" 
                aria-label="Buscar"
              >
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </div>
    </nav>

    <main style="margin-top: 80px;">
      <router-view />
    </main>
  </div>
</template>

<script setup>
  import { RouterView } from 'vue-router';
</script>

<style scoped>

</style>
