<template>
  <li class="blogListItem mb-4 xs:mb-8">
    <nuxt-link :to="`/blog/${post.id}`" class="blogListItem__link">
      <div class="blogListItem__thumbnail border border-gray-200">
        <div class="blogListItem__thumbnail__inner">
          <atom-img :src="post.thumbnail" :alt="''" />
        </div>
      </div>
      <div class="blogListItem__title text-center mt-3">
        {{ post.title }}
      </div>
    </nuxt-link>
  </li>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'
import AtomImg from '../atoms/AtomImg.vue'

export default defineComponent({
  components: {
    AtomImg
  },
  props: {
    post: Object
  },
  setup() {
  }

})
</script>


<style lang="scss" scoped>
.blogListItem {
  $p: &;

  &__link {
    text-decoration: none;
    display: block;
    &:hover {
      #{$p}__thumbnail {
        &__inner {
          transform: scale(1.1);
        }
      }
    }
  }
  &__title {
    font-size: 12px;
    letter-spacing: 0.08em;
    line-height: 1.8;
  }
  &__thumbnail {
    overflow: hidden;
    &__inner {
      transition: transform .6s;
    }
  }
}
</style>
