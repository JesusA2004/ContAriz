<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ContAriz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="" class="nav-link active" aria-current="page" href="#">Inicio</router-link>
            </li>
            <li class="nav-item">
              <router-link to="" class="nav-link" href="#">Sobre Nosotros</router-link>
            </li>
            <li class="nav-item">
              <router-link to="" class="nav-link" href="#">Contacto</router-link>
            </li>
            <li class="nav-item dropdown">
              <router-link to="" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ingresar
              </router-link>
              <ul class="dropdown-menu">
                <li><router-link to="/" class="dropdown-item">Iniciar sesión</router-link></li>
                <li><router-link to="/registrar" class="dropdown-item">Registrar</router-link></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <div class="container-fluid mt-3">
    <router-view/>
  </div> 

</template>

<style scoped>

</style>
