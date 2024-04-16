<script setup>
import Layout from "@/Layouts/Auth.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  terms: false,
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Layout title="Registrar">
    <div class="card card-md">
      <div class="card-body">
        <h2 class="h2 text-center mb-4">Registrar</h2>
        <form @submit.prevent="submit">
          <div class="mb-3">
            <label class="form-label">Nome</label>
            <input
              v-model="form.name"
              type="text"
              :class="{ 'is-invalid': form.errors.name }"
              class="form-control"
              placeholder="Seu nome"
              required
              autofocus
            />

            <InputError :message="form.errors.name" />
          </div>

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
            <label class="form-label"> Senha </label>

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
                  title="Mostrar senha"
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
            <label class="form-label"> Confirme a Senha </label>

            <div class="input-group input-group-flat">
              <input
                v-model="form.password_confirmation"
                type="password"
                :class="{ 'is-invalid': form.errors.password_confirmation }"
                class="form-control"
                placeholder="Confirme a Senha"
                required
                autocomplete="current-password"
              />
              <span class="input-group-text">
                <a
                  href="#"
                  class="link-secondary"
                  title="Mostrar senha"
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

            <InputError :message="form.errors.password_confirmation" />
          </div>

          <!-- <div class="mb-2">
            <label class="form-check">
              <input
                v-model="form.remember"
                type="checkbox"
                class="form-check-input"
                name="remember"
              />

              <span class="form-check-label">
                Ao se registrar na plataforma você concorda com os nossos
                <Link :href="route('terms.show')" target="_blank">Política de Privacidade</Link>
                e os
                <Link :href="route('policy.show')" target="_blank">Termos e Condições</Link>
              </span>
            </label>
          </div> -->

          <div class="form-footer">
            <button
              type="submit"
              class="btn btn-primary w-100"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Registrar
            </button>
          </div>
        </form>
      </div>

      <div class="hr-text">ou</div>

      <div class="card-body">
        <div class="row">
          <div class="col">
            <a href="#" class="btn w-100">
              <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon text-github"
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

              Entrar com Github
            </a>
          </div>

          <div class="col">
            <a href="#" class="btn w-100">
              <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon text-twitter"
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
                  d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"
                />
              </svg>
              Entrar com Twitter
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center text-muted mt-3">
      Já tem uma conta?
      <Link :href="route('login')" tabindex="-1">Inicie sessão</Link>
    </div>
  </Layout>
</template>
