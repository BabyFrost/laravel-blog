<?php

    namespace App\Models;

    use Illuminate\Support\HigherOrderCollectionProxy;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Illuminate\Support\Facades\File;
    use Spatie\YamlFrontMatter\YamlFrontMatter;

    class Post {

        public $slug;
        public $title;
        public $excerpt;
        public $date;
        public $body;

        public function __construct( $slug, $title, $excerpt, $date, $body ) {
            $this->slug = $slug;
            $this->title = $title;
            $this->excerpt = $excerpt;
            $this->date = $date;
            $this->body = $body;
        }

        public static function findAll() {

            return collect(File::files(resource_path("posts")))
                        ->map(fn($file) => YamlFrontMatter::parseFile($file))
                        ->map(fn($document) => new Post( $document->slug, $document->title, $document->excerpt, $document->title, $document->body() ))
                        ->sortBy('date');

            // $files = File::files(resource_path("posts/"));
            // return array_map( fn($file) => $file->getContents(), $files);
        }

        public static function find($slug) {

            $post = static::findAll()->firstWhere('slug', $slug);

            if( !$post ) {
                throw new ModelNotFoundException();
            }

            return $post;

            //$path = __DIR__ . "/../resources/posts/{$slug}.html";
            // $path = resource_path("posts/{$slug}.html");

            // if( !file_exists($path) ) {
            //     throw new ModelNotFoundException();
            // }

            // return cache() -> remember("posts.{slug}", 5, fn() => file_get_contents($path));  
        }

    }