<script setup>
defineProps({
  title: String,
});
</script>

<template>
  <Head :title="title"></Head>

  <div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <Link to="route('home')" class="navbar-brand navbar-brand-autodark">
          <img src="@/logo.svg" height="36" alt="" />
        </Link>
      </div>

      <slot />
    </div>
  </div>
</template>
