<script setup>
import Layout from "@/Layouts/Auth.vue";
import { Link, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form
    .transform((data) => ({
      ...data,
      remember: form.remember ? "on" : "",
    }))
    .post(route("admin.login"), {
      onFinish: () => form.reset("password"),
    });
};
</script>

<template>
  <Layout title="Iniciar Sessão">
    <div class="card card-md">
      <div class="card-body">
        <h2 class="h2 text-center mb-4">Iniciar Sessão</h2>

        <form @submit.prevent="submit">
          <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input
              v-model="form.email"
              type="email"
              :class="{ 'is-invalid': form.errors.email }"
              class="form-control"
              placeholder="exemplo@email.com"
              required
              autofocus
              autocomplete="username"
            />

            <InputError :message="form.errors.email" />
          </div>

          <div class="mb-2">
            <label class="form-label">
              Senha
              <span class="form-label-description">
                <Link v-if="canResetPassword" :href="route('password.request')">
                  Esqueci a minha senha
                </Link>
              </span>
            </label>

            <div class="input-group input-group-flat">
              <input
                v-model="form.password"
                type="password"
                :class="{ 'is-invalid': form.errors.password }"
                class="form-control"
                placeholder="Senha"
                required
                autocomplete="current-password"
              />

              <span class="input-group-text">
                <a
                  href="#"
                  class="link-secondary"
                  title="Show password"
                  data-bs-toggle="tooltip"
                  ><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
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
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path
                      d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"
                    />
                  </svg>
                </a>
              </span>
            </div>

            <InputError :message="form.errors.password" />
          </div>

          <div class="mb-2">
            <label class="form-check">
              <input
                v-model="form.remember"
                type="checkbox"
                class="form-check-input"
                name="remember"
              />
              <span class="form-check-label">Manter sessão iniciada</span>
            </label>
          </div>

          <div class="form-footer">
            <button
              type="submit"
              class="btn btn-primary w-100"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Iniciar Sessão
            </button>
          </div>
        </form>
      </div>
    </div>
  </Layout>
</template>
