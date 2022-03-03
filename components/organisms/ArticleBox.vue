<template>
  <article class="articleBox block mx-auto">
    <header class="articleBox__header">
      <h1 class="articleBox__title text-center mb-12 md:mb-8 md:px-0">
        {{ post.title }}
      </h1>
      <div class="articleBox__img border border-gray-200">
        <atom-img :src="post.eyecatch" :alt="''" />
      </div>
    </header>

    <main class="articleBox__content mt-8">
      <div class="articleBox__content__inner mx-auto">
        <div class="articleBox__content__text" v-html="sanitize(post.content)" />
      </div>
    </main>

    <footer class="articleBox__footer text-center mt-16">
      <article-box-item :title="'SCOPE'">
        {{ showScope(post.scope) }}
      </article-box-item>
      <article-box-item :title="'SITE'" class="mt-12">
        <a :href="post.siteUrl" target="_blank">{{ showSiteText(post.siteUrl, post.sitetext) }}</a>
      </article-box-item>
    </footer>
  </article>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'
import sanitize from 'sanitize-html'
import Heading1 from '../molecules/Heading1.vue'
import ArticleBoxItem from '../molecules/ArticleBoxItem.vue'
import AtomImg from '../atoms/AtomImg.vue'

export default defineComponent({
  components: {
    Heading1,
    AtomImg,
    ArticleBoxItem
  },
  props: {
    post: Object,
  },
  setup() {
    const showScope = (scope: any) => {
      let text = '';
      for (let idx in scope) {
        text += scope[idx].name + ' / ';
      }
      return text.slice(0, -3);
    }

    const showSiteText = (url: string, text: string) => {
      return !!text ? text : url;
    }

    return {
      showSiteText,
      showScope,
      sanitize,
    }
  },
})
</script>

<style lang="scss" scoped>
.articleBox {
  $p: &;
  max-width: 800px;
  &__title {
    font-size: 28px;
    letter-spacing: 0.12em;
    line-height: 1.7;
    @screen md {
      font-size: 20px;
    }
  }
  &__content {
    &__item {
      line-height: 2;
    }
    &__text {
      font-size: 14px;
      letter-spacing: 0.12em;
      line-height: 2;
    }
  }
}
</style>
