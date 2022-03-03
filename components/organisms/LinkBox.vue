<template>
  <div class="linkBox mt-24 mx-auto relative flex justify-between">
    <link-box-item :icon="'prev'" :post="post.prev" class="linkBox__prev">
      PREV
    </link-box-item>
    <link-box-item class="linkBox__list" :link="'/'">
      LIST
    </link-box-item>
    <link-box-item :icon="'next'" :post="post.next" class="linkBox__next">
      NEXT
    </link-box-item>
  </div>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'
import LinkBoxItem from '../molecules/LinkBoxItem.vue'

export default defineComponent({
  components: {
    LinkBoxItem
  },
  props: {
    post: Object
  },
  setup() {
  },
})
</script>

<style lang="scss" scoped>
.linkBox {
  max-width: 800px;
  &__list {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
  }
}
</style>
