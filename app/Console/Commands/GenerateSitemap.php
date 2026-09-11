<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and update the public sitemap.xml file for SEO';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $baseUrl = rtrim(config('app.url', 'https://akuntanindonesia.id'), '/');
        if (str_contains($baseUrl, 'localhost')) {
            $baseUrl = 'https://akuntanindonesia.id';
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"'.PHP_EOL;
        $xml .= '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"'.PHP_EOL;
        $xml .= '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.PHP_EOL;

        $urls = [
            ['loc' => $baseUrl.'/', 'priority' => '1.0', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
            ['loc' => $baseUrl.'/#layanan', 'priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
            ['loc' => $baseUrl.'/#founder', 'priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
            ['loc' => $baseUrl.'/#misi-nilai', 'priority' => '0.8', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
            ['loc' => $baseUrl.'/#perbandingan', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
            ['loc' => $baseUrl.'/#berita', 'priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['loc' => $baseUrl.'/berita', 'priority' => '0.9', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['loc' => $baseUrl.'/#faq', 'priority' => '0.6', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
            ['loc' => $baseUrl.'/#kontak', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
        ];

        try {
            $articles = Article::where('is_published', true)->latest('updated_at')->get();
            foreach ($articles as $art) {
                $urls[] = [
                    'loc' => $baseUrl.'/berita/'.$art->slug,
                    'priority' => '0.8',
                    'changefreq' => 'monthly',
                    'lastmod' => $art->updated_at ? $art->updated_at->format('Y-m-d') : date('Y-m-d'),
                ];
            }
        } catch (\Throwable $e) {
            $this->warn('Could not load articles: '.$e->getMessage());
        }

        foreach ($urls as $u) {
            $xml .= '    <url>'.PHP_EOL;
            $xml .= '        <loc>'.htmlspecialchars($u['loc']).'</loc>'.PHP_EOL;
            $xml .= '        <lastmod>'.$u['lastmod'].'</lastmod>'.PHP_EOL;
            $xml .= '        <changefreq>'.$u['changefreq'].'</changefreq>'.PHP_EOL;
            $xml .= '        <priority>'.$u['priority'].'</priority>'.PHP_EOL;
            $xml .= '    </url>'.PHP_EOL;
        }

        $xml .= '</urlset>'.PHP_EOL;

        $targetPath = public_path('sitemap.xml');
        file_put_contents($targetPath, $xml);

        $this->info("Sitemap successfully generated at {$targetPath} with ".count($urls).' URLs.');

        return Command::SUCCESS;
    }
}
