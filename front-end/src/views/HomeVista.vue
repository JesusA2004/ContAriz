<template>
  <div class="dashboard-page">
    <!-- Header with background image + overlay -->
    <header class="dashboard-header text-white d-flex align-items-center justify-content-center">
      <div class="overlay"></div>
      <h1 class="display-4">Bienvenido, Admin</h1>
    </header>

    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar Navigation -->
        <nav class="col-12 col-md-3 col-lg-2 sidebar bg-beige p-3">
          <ul class="nav flex-column">
            <li class="nav-item" v-for="item in navItems" :key="item.text">
              <router-link :to="item.to" class="nav-link d-flex align-items-center">
                <img :src="item.icon" alt class="me-2 nav-icon">
                <span>{{ item.text }}</span>
              </router-link>
            </li>
          </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-12 col-md-9 col-lg-10 p-4">
          <div class="row g-4">
            <div class="col-12 col-sm-6 col-lg-3" v-for="card in cards" :key="card.title">
              <div class="card dashboard-card h-100 text-center p-3">
                <img :src="card.icon" alt class="card-icon mb-2">
                <h5 class="card-title">{{ card.title }}</h5>
                <p class="card-text">{{ card.value }}</p>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<script setup>
// Rutas e íconos para la navegación lateral
const navItems = [
  { to: '/dashboard',    text: 'Inicio',      icon: 'https://img.icons8.com/ios-filled/24/000000/home.png' },
  { to: '/empleados',    text: 'Empleados',   icon: 'https://img.icons8.com/ios/24/000000/user-group-man-man.png' },
  { to: '/salarios',     text: 'Salarios',    icon: 'https://img.icons8.com/ios/24/000000/money-with-wings.png' },
  { to: '/reportes',     text: 'Reportes',    icon: 'https://img.icons8.com/ios/24/000000/combo-chart--v1.png' },
  { to: '/ajustes',      text: 'Ajustes',     icon: 'https://img.icons8.com/ios/24/000000/settings.png' }
];

// Datos de ejemplo para los cards del dashboard
const cards = [
  { title: 'Total Empleados',    value: '120', icon: 'https://img.icons8.com/ios-filled/48/000000/employee-card.png' },
  { title: 'Salario Mensual',     value: '$45,000', icon: 'https://img.icons8.com/ios-filled/48/000000/salary.png' },
  { title: 'Pendientes Pago',     value: '8', icon: 'https://img.icons8.com/ios-filled/48/000000/alarm.png' },
  { title: 'Generar Reporte',     value: 'Ahora', icon: 'https://img.icons8.com/ios-filled/48/000000/document.png' }
];
</script>

<style scoped>
.dashboard-header {
  position: relative;
  height: 250px;
  background-image: url('@/assets/images/backgroundLogin.png');
  background-size: cover;
  background-position: center;
  margin-bottom: 2rem;
  overflow: hidden;
}
.dashboard-header .overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
}
.dashboard-header h1 {
  position: relative;
  z-index: 1;
  font-weight: 600;
  transition: transform 0.3s ease;
}
.dashboard-header:hover h1 {
  transform: scale(1.05);
}

/* Sidebar */
.sidebar {
  min-height: calc(100vh - 250px);
  background-color: #f9f5f0;
}
.nav-link {
  color: #333;
  padding: 0.75rem 1rem;
  border-radius: 0.375rem;
  transition: background-color 0.3s ease, color 0.3s ease;
}
.nav-link:hover {
  background-color: #404e5e;
  color: #fff;
}
.nav-icon {
  width: 1.25rem;
  height: 1.25rem;
}

/* Dashboard Cards */
.dashboard-card {
  background-color: #fff;
  border: none;
  border-radius: 0.75rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.dashboard-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}
.card-icon {
  width: 2rem;
  height: 2rem;
}

/* Utility colors */
.bg-beige {
  background-color: #f5f0e1 !important;
}
</style>
