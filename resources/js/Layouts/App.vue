<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import { onMounted } from "vue";

defineProps({
  title: String,
});

onMounted(() => {
  document.body.classList.remove("justify-content-center");
});

const logout = () => {
  router.post(route("logout"));
  window.location = route("home");
};
</script>

<template>
  <Head :title="title"></Head>

  <div class="page">
    <!-- Navbar -->
    <header class="navbar navbar-expand-md d-print-none">
      <div class="container-xl">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbar-menu"
          aria-controls="navbar-menu"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <h1
          class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3"
        >
          <Link :href="route('dashboard')">
            <img
              src="@/public/logo.svg"
              width="110"
              height="32"
              alt="Tabler"
              class="navbar-brand-image"
            />
          </Link>
        </h1>

        <div class="navbar-nav flex-row order-md-last">
          <div class="nav-item d-none d-md-flex me-3">
            <div class="btn-list">
              <a
                href="https://github.com/dorivaldovalentim/personal-manager"
                class="btn"
                target="_blank"
                rel="noreferrer"
              >
                <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="icon"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"
                  />
                </svg>
                Código
              </a>
              <a
                href="https://github.com/sponsors/dorivaldovalentim"
                class="btn"
                target="_blank"
                rel="noreferrer"
              >
                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="icon text-pink"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"
                  />
                </svg>
                Patrocinar
              </a>
            </div>
          </div>
          <div class="d-none d-md-flex">
            <a
              href="?theme=dark"
              class="nav-link px-0 hide-theme-dark"
              title="Modo escuro"
              data-bs-toggle="tooltip"
              data-bs-placement="bottom"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"
                />
              </svg>
            </a>
            <a
              href="?theme=light"
              class="nav-link px-0 hide-theme-light"
              title="Modo claro"
              data-bs-toggle="tooltip"
              data-bs-placement="bottom"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path
                  d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"
                />
              </svg>
            </a>
          </div>
          <div class="nav-item dropdown">
            <a
              href="#"
              class="nav-link d-flex lh-1 text-reset p-0"
              data-bs-toggle="dropdown"
              aria-label="Abrir menu do usuário"
            >
              <span
                class="avatar avatar-sm"
                :style="{
                  backgroundImage: `url(
                    ${
                      $page.props.auth.user.profile_photo_path ??
                      $page.props.auth.user.profile_photo_url
                    }
                  )`,
                }"
              ></span>
              <div class="d-none d-xl-block ps-2">
                <div>{{ $page.props.auth.user.name }}</div>
                <div class="mt-1 small text-muted">{{ $page.props.auth.user.email }}</div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <form @submit.prevent="logout">
                <button type="submit" class="dropdown-item">Terminar Sessão</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>

    <header class="navbar-expand-md">
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
          <div class="container-xl">
            <ul class="navbar-nav">
              <li :class="{ active: route().current('dashboard') }" class="nav-item">
                <Link :href="route('dashboard')" class="nav-link">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"
                    ><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                      <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                      <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                  </span>
                  <span class="nav-link-title"> Página Inicial </span>
                </Link>
              </li>

              <li :class="{ active: route().current('tasks.index') }" class="nav-item">
                <a :href="route('tasks.index')" class="nav-link">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"
                    ><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-list-check"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                      <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                      <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                      <path d="M11 6l9 0" />
                      <path d="M11 12l9 0" />
                      <path d="M11 18l9 0" />
                    </svg>
                  </span>
                  <span class="nav-link-title"> Tarefas </span>
                </a>
              </li>
            </ul>
            <div
              class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last"
            >
              <form action="./" method="get" autocomplete="off" novalidate>
                <div class="input-icon">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                      <path d="M21 21l-6 -6" />
                    </svg>
                  </span>

                  <input
                    type="text"
                    value=""
                    class="form-control"
                    placeholder="Pesquisar..."
                    aria-label="Pesquisar"
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="page-wrapper">
      <!-- Page header -->
      <div class="page-header d-print-none">
        <div class="container-xl">
          <slot name="header" />
        </div>
      </div>

      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <slot name="body" />
        </div>
      </div>

      <!-- Page additional content -->
      <slot name="additional" />

      <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  <a href="./license.html" class="link-secondary">Licença</a>
                </li>

                <li class="list-inline-item">
                  <a
                    href="https://github.com/dorivaldovalentim/personal-manager"
                    target="_blank"
                    class="link-secondary"
                    rel="noopener"
                    >Código</a
                  >
                </li>

                <li class="list-inline-item">
                  <a
                    href="https://github.com/sponsors/dorivaldovalentim"
                    target="_blank"
                    class="link-secondary"
                    rel="noopener"
                  >
                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon text-pink icon-filled icon-inline"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"
                      />
                    </svg>
                    Patrocinar
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  Copyright &copy; 2023
                  <a href="https://tabler.io" class="link-secondary">Tabler</a>. Todos os
                  direitos reservados
                </li>

                <li class="list-inline-item">
                  <a href="./changelog.html" class="link-secondary" rel="noopener">
                    v1.0.0-beta19
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</template>
