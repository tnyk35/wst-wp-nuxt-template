# WST-WP-NUXT-templateについて

- WP REST API＋Nuxt＋GitHub Actionsでレンタルサーバーに自動デプロイできるテンプレートです。
- MITライセンスですので、これベースに作り直すなり、改造するなりご自由にお使いくださいませ。
- ※ただし、本テンプレートを利用することで発生した損失・損害・事故などいかなるトラブル・問題は一切責任を負いません。あらかじめご了承ください。

[WordPress＋Nuxt(SSG)＋GitHub Actionsでレンタルサーバーに自動デプロイする方法｜ブログ｜ウェブスタジオTANI](https://tnyk.jp/frontend/wp-nuxt-github-actions/)

弊ブログ記事で使い方を解説しています。


## 概要

- WordPressのREST APIでデータ取得
- Nuxtは、axios / Composition API / TailwindCSSで実装
- GitHub Actionsでビルドしてレンタルサーバーにアップされる

## ファイル構成

抜粋して説明します。

下記修正することで動作するようになります。詳しくはブログ記事をご覧ください。

/_wp_theme/functions-endpoints.php  
WP REST APIのエンドポイントを作成。WordPressテーマファイルに設置

/_wp_theme/functions-nuxt.php  
GitHub ActionsのHookなどの処理を書いてます。以下を適宜修正すると動作するようになります。

```php
/* -------------------------- */
/* GitHub ActionsのHookを実行 */
/* -------------------------- */
function dispatch_github_actions() {
  $token = 'アクセストークンを記入';
  $url = 'https://api.github.com/repos/ユーザ名/レポジトリ/dispatches';
```

また、このファイルを現在適用されてるテーマのfunctions.php一番下にインクルードさせてください。

```php
$filename = __DIR__ . '/functions-nuxt.php';
if (file_exists($filename)) {
  require_once __DIR__ . '/functions-nuxt.php';
}
```

/nuxt.config.js  
nuxtの設定ファイル。下記をWP REST APIのURLに適宜修正してください。

```javascript
axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: 'https://サイトのドメインが入ります/wp-json/',
  },
```

/.github/workflows/save.yml  
GitHub Actionsのワークフローを記載したファイル。

Secretsを設定すると動作するようになります。下記４つ設定しましょう。

```
DEPLOY_DIR　　アップロード先のディレクトリを入力

FTP_SERVER　　FTPのサーバー名を入力

FTP_USER　　FTPのユーザー名を入力

FTP_PASSWORD　　FTPのパスワードを入力
```

上記設定後、下記ビルドセットアップをすることで動作します。

## Build Setup

```bash
# install dependencies
$ npm install

# serve with hot reload at localhost:3000
$ npm run dev

# build for production and launch server
$ npm run build
$ npm run start

# generate static project
$ npm run generate
```
