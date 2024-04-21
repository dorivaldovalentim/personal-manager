<script setup>
import Layout from "@/Layouts/App.vue";
import { ref, Transition, onMounted } from "vue";
import Modal from "@/Components/Modal.vue";
import { useForm } from "@inertiajs/vue3";

defineProps({
  tasks: {
    type: Array,
    default: [],
  },
});

let id = ref(null);

const form = useForm({
  task: "",
  description: "",
  status: false,
});

onMounted(() => {
  const modal = document.getElementById("modal-theme");
  modal.addEventListener("hidden.bs.modal", () => {
    reset();
  });
});

const store = () => {
  form.post(route("tasks.store"), {
    onSuccess: () => {
      document.querySelector('[data-bs-dismiss="modal"]').click();
      reset();
    },
  });
};

const edit = (task) => {
  fill(task);
};

const update = () => {
  form
    .transform((data) => ({
      ...data,
      status: form.status ? true : false,
    }))
    .put(route("tasks.update", id.value), {
      onSuccess: () => {
        document.querySelector('[data-bs-dismiss="modal"]').click();
        reset();
      },
    });
};

const destroy = (id) => {
  if (confirm("Tem a certeza que quer eliminar esta tarefa?")) {
    form.delete(route("tasks.destroy", id), {
      onSuccess: () => {
        document.querySelector('[data-bs-dismiss="modal"]').click();
        reset();
      },
    });
  }
};

const fill = (task) => {
  id.value = task.id;
  form.task = task.task;
  form.description = task.description;
  form.status = task.status ? true : false;
};

const reset = () => {
  id.value = null;
  form.reset();
};
</script>

<template>
  <Layout title="Tarefas">
    <template #header>
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">Overview</div>
          <h2 class="page-title">Tarefas</h2>
        </div>

        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <a
              href="#"
              class="btn btn-primary d-none d-sm-inline-block"
              data-bs-toggle="modal"
              data-bs-target="#modal-theme"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon me-0"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
            </a>

            <a
              href="#"
              class="btn btn-primary d-sm-none btn-icon"
              data-bs-toggle="modal"
              data-bs-target="#modal-theme"
              aria-label="Nova tarefa"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
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
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </template>

    <template #body>
      <div class="row row-cards">
        <Transition v-for="(item, index) in tasks" :key="index">
          <div class="col-12 col-md-6 col-lg-4">
            <div
              @click="edit(item)"
              data-bs-toggle="modal"
              data-bs-target="#modal-theme"
              class="card cursor-pointer"
            >
              <div
                :class="[item.status ? 'bg-success' : 'bg-danger']"
                class="card-status-top"
              ></div>

              <div class="card-body d-flex justify-content-between">
                <p class="mb-0">{{ item.task }}</p>
              </div>
            </div>
          </div>
        </Transition>
      </div>
    </template>

    <template #additional>
      <form @submit.prevent="id ? update() : store()">
        <Modal :title="id ? 'Actualizar tarefa' : 'Nova tarefa'">
          <div class="mb-3">
            <label class="form-label">Tarefa</label>
            <input
              v-model="form.task"
              type="text"
              :class="{ 'is-invalid': form.errors.task }"
              class="form-control"
              placeholder="Tarefa"
              required
              autofocus
            />

            <InputError :message="form.errors.task" />
          </div>

          <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea
              v-model="form.description"
              :class="{ 'is-invalid': form.errors.description }"
              class="form-control"
              placeholder="Descrição"
              rows="4"
            ></textarea>

            <InputError :message="form.errors.description" />
          </div>

          <div v-if="id" class="mb-2">
            <label class="form-check">
              <input
                v-model="form.status"
                type="checkbox"
                class="form-check-input"
                name="status"
              />
              <span class="form-check-label">Estado</span>
            </label>
          </div>

          <template #additionalActions>
            <button
              type="submit"
              class="btn btn-primary"
              v-if="!id"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Nova tarefa
            </button>

            <template v-else>
              <a @click.prevent="destroy(id)" href="#" class="btn btn-danger">
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
                  class="icon icon-tabler icons-tabler-outline icon-tabler-trash me-0"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 7l16 0" />
                  <path d="M10 11l0 6" />
                  <path d="M14 11l0 6" />
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
              </a>

              <button
                type="submit"
                class="btn btn-primary"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Actualizar tarefa
              </button>
            </template>
          </template>
        </Modal>
      </form>
    </template>
  </Layout>
</template>
