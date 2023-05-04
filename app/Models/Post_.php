<?php

namespace App\Models;

class Post
{

    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Mahadi Saputra",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima ipsum accusantium quidem eos laboriosam, velit natus ea eveniet voluptates nulla a fugiat aut nam aliquid exercitationem atque explicabo ipsa voluptate cum facilis, consequatur pariatur est! Minima nobis illo doloribus voluptates natus at rem assumenda maiores dignissimos vero magni delectus laboriosam sit quae, vel, ab iure sint, exercitationem quibusdam incidunt eveniet officiis beatae dolore! Fuga quibusdam et, maiores sunt eligendi, incidunt exercitationem laboriosam nisi eos esse fugit hic dolor voluptatem eum quidem. Ullam cupiditate et eveniet officiis possimus architecto accusantium vero dolores vitae? Dolorum natus corporis, aliquid ut cupiditate neque? Aspernatur.",
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Dode Mahadi Saputra, S.Kom, BIT",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum laudantium modi possimus doloremque unde ex obcaecati, magni maiores officiis temporibus harum dignissimos porro rerum eius, nam odit ipsa architecto dolore eaque ducimus. Autem, culpa eius! Fugiat aut eaque quam nostrum odit sit at, voluptates quasi omnis iure placeat recusandae minima quo, necessitatibus facilis, commodi aliquid! Molestias nihil corporis voluptate repudiandae fugit quisquam, temporibus ducimus odit ullam voluptatum quod itaque facere nemo velit illo maxime recusandae vero! Rem officia unde inventore?",
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
