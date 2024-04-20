<script setup>
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";

defineProps({
  title: String,
});

onMounted(() => {
  document.body.classList.remove("justify-content-center");
});
</script>

<template>
  <Head :title="title"></Head>

  <div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <Link :href="route('home')" class="navbar-brand navbar-brand-autodark">
          <img src="@/public/logo.svg" height="36" alt="" />
        </Link>
      </div>

      <slot />
    </div>
  </div>
</template>
