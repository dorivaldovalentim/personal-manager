<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { onMounted } from "vue";

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  canAdminLogin: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
});

onMounted(() => {
  document.body.classList.add("justify-content-center");
});
</script>

<template>
  <Head title="Página Inicial"></Head>

  <div class="page page-center">
    <div class="container-narrow py-4">
      <div class="empty">
        <div class="empty-img">
          <img src="@/home.svg" height="128" alt="" />
        </div>

        <p class="empty-title">Olá e seja muito bem vindo! ❤️😉</p>
        <p class="empty-subtitle text-muted">
          Bem-vindo ao <b class="text-uppercase">personal manager</b> aplicativo de gestão
          financeira e pessoal! Aqui, você pode registrar suas despesas e receitas,
          gerenciar seu orçamento de forma inteligente, visualizar relatórios detalhados e
          planejar seu futuro financeiro. Feito para ajudar você a conquistar uma gestão
          financeira mais tranquila e eficiente. Explore as ferramentas e comece hoje
          mesmo a trilhar o caminho para uma vida financeira mais próspera!
        </p>

        <div v-if="canLogin || canAdminLogin" class="empty-action">
          <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="btn btn-primary"
          >
            Dashboard
          </Link>

          <template v-else>
            <span class="mx-1"></span>
            <Link :href="route('login')" class="btn btn-primary"> Iniciar Sessão </Link>
            <span class="mx-1"></span>
            <Link v-if="canRegister" :href="route('register')" class="btn btn-primary">
              Registrar
            </Link>
          </template>
          <span class="mx-1"></span>
          <Link :href="route('admin.login')" class="btn btn-warning"> Admin </Link>
        </div>
      </div>
    </div>
  </div>
</template>
