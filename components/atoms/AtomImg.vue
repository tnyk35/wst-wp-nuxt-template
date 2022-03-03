<template>
  <div class="atomImg">
    <div class="atomImg__inner">
      <img
        :src="src"
        :alt="alt"
      >
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'

export default defineComponent({
  props: {
    src: String,
    alt: String,
  },
  setup() {
  },
})
</script>
