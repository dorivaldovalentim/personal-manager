<script setup>
defineProps({
  title: {
    type: String,
    default: "Modal",
  },
});
</script>

<template>
  <div
    class="modal modal-blur fade"
    id="modal-theme"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ title }}</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>

        <div class="modal-body">
          <slot></slot>
        </div>

        <div class="modal-footer">
          <slot name="footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">
              Fechar
            </button>

            <slot name="additionalActions" />
          </slot>
        </div>
      </div>
    </div>
  </div>
</template>
