<?php
/*-------------------------------------------*/
/* 独自エンドポイント登録
/*-------------------------------------------*/
add_action('rest_api_init', 'add_custom_post_endpoint');

function add_custom_post_endpoint()
{
    register_rest_route(
        'custom/v0',
        '/posts',
        [
            'methods'  =>  WP_REST_Server::READABLE,
            'callback' => 'custom_api_get_all_posts',
            'permission_callback' => '__return_true',
        ]
    );

    register_rest_route(
        'custom/v0',
        '/posts/(?P<id>\d+)',
        [
            'methods'  =>  WP_REST_Server::READABLE,
            'callback' => 'custom_api_get_post',
            'permission_callback' => '__return_true',
        ]
    );
}

function custom_api_get_all_posts()
{
    $postsData = array();
    $posts = get_posts(array(
        'posts_per_page' => 15,
        'post_type' => 'post',
    ));

    foreach ($posts as $post) {
        $postsData[] = __get_post_data($post);
    }
    return $postsData;
}

function custom_api_get_post($params)
{
    $id = $params['id'];
    if ($id) {
        global $post;
        $post = get_post($id);

        if ($post) {
            $data = __get_post_data($post);
        }

        // 隣接記事を取得
        $data = __get_post_adjacent_data($data);

        return $data;
    }
    return false;
}


/*-------------------------------------------*/
/* 独自関数
/*-------------------------------------------*/
/**
 * 投稿記事を取得
 */
function __get_post_data($post)
{
    $id = $post->ID;
    $thumbnail = has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail_url( $post->ID, 'blog-thumbnail' ) : ''; // サムネイルは適宜変更してください
    $eyecatch = has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail_url( $post->ID, 'blog-single-thumbnail' ) : ''; // サムネイルは適宜変更してください
    $category = __get_post_categories($id);

    return array(
        'id' => $id,
        'title' => $post->post_title,
        'content' => nl2br($post->post_content),
        'eyecatch' => $eyecatch,
        'thumbnail' => $thumbnail,
        'category' => $category,
    );
}

/**
 * 担当（スコープ）部分の取得
 */
function __get_post_categories($id)
{
    $list = array();
    $cats = get_the_category($id);

    foreach ($cats as $cat) {

        $list[] = [
            'id' => $cat->term_id,
            'name' => $cat->name,
            'slug' => $cat->slug
        ];
    }

    return $list;
}

/**
 * prev記事, next記事を取得
 */
function __get_post_adjacent_data($data)
{
    $prev = get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);

    array_push($data, [
        'prev' => array(),
        'next' => array(),
    ]);
    if ($prev) {
        $data['prev'] = __get_post_data($prev);
    }
    if ($next) {
        $data['next'] = __get_post_data($next);
    }

    return $data;
}

