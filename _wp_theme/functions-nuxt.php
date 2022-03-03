<?php
// add_image_size('blog-thumbnail', 640, 480, true);
// add_image_size('blog-single-thumbnail', 1600, 1200, true);


/* -------------------------- */
/* GitHub ActionsへのHookを設定 */
/* -------------------------- */
// add_action('publish_works', 'after_saving_wordpress', 10, 2);
// add_action('publish_to_draft', 'publish_to_saving_wordpress', 10, 1);
// add_action('publish_to_trash', 'publish_to_saving_wordpress', 10, 1);

// function after_saving_wordpress($post_id, $post) {
//   dispatch_github_actions();
//   return true;
// }

// function publish_to_saving_wordpress($post) {
//   if ($post->post_type === 'works') {
//     dispatch_github_actions();
//     return true;
//   }
//   return false;
// }

/* -------------------------- */
/* GitHub ActionsのHookを実行 */
/* -------------------------- */
function dispatch_github_actions() {
  $token = 'アクセストークンを記入';
  $url = 'https://api.github.com/repos/ユーザ名/レポジトリ/dispatches';
  $headers = [
    'Authorization: bearer ' . $token,
    'Accept: application/vnd.github.v3+json',
    'User-Agent: after_saving_wordpress'
  ];
  $data = [
    'event_type' => 'after_saving_wordpress',
  ];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HEADER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_exec($ch);
  curl_close($ch);
}

/* -------------------------- */
/* GitHub ActionsへのHook実行を管理画面に追加 */
/* -------------------------- */
add_action('admin_menu', 'custom_menu_page');
function custom_menu_page() {
  add_menu_page(
    'GitHub Actionsフック実行',
    'GitHub Actionsフック実行',
    'manage_options',
    'custom_menu_page',
    'add_custom_menu_page',
    'dashicons-admin-generic',
    100
  );
}
function add_custom_menu_page() {
  if ( !current_user_can( 'manage_options' ) ) {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }

  echo '<div class="wrap">';
  echo '<h2>GitHub Actionsフック実行画面</h2>';

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty( $_POST['run'] ) && $_POST['run'] === 'run') {
    dispatch_github_actions();
    echo "GitHub Actionsのフックが実行されました。";
  } else {
    echo '<form method="post" action="">';
    echo '<button type="submit" name="run" value="run">実行を開始</button>';
    echo '</form>';
  }
  echo '</div>';
}

/* -------------------------- */
/* REST API endpoints */
/* -------------------------- */
require_once __DIR__ . '/functions-endpoints.php';
