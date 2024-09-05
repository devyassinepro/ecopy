<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Cache::remember('sitemap', 60 * 24, function () {
            $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
            $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

            $sitemap .= '<url><loc>' . url('/') . '</loc></url>';
            $sitemap .= '<url><loc>' . url('/about') . '</loc></url>';

            $posts = BlogPost::all();
            foreach ($posts as $post) {
                $sitemap .= '<url>';
                $sitemap .= '<loc>' . url("/blog/{$post->slug}") . '</loc>';
                $sitemap .= '<lastmod>' . $post->updated_at->toAtomString() . '</lastmod>';
                $sitemap .= '</url>';
            }

            $sitemap .= '</urlset>';
            return $sitemap;
        });

        return response($sitemap, 200)->header('Content-Type', 'application/xml');
    }
}