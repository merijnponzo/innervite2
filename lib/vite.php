<?php
// from https://github.com/andrefelipe/vite-php-setup


define('IS_DEVELOPMENT', true);


function vite($entry): string
{
    return jsTag($entry)
        . jsPreloadImports($entry)
        . cssTag($entry);
}


// Helpers to print tags

function jsTag(string $entry): string
{
    if (IS_DEVELOPMENT) {
        $url = 'http://localhost:3000/' . $entry;
    }else {
        $url = assetUrl($entry);
    }
    if (!$url) {
        return '';
    }
    return '<script type="module" crossorigin src="'
        . $url
        . '"></script>';
}

function jsPreloadImports(string $entry): string
{
    if (IS_DEVELOPMENT) {
        return '';
    }else{
        $res = '';
        foreach (importsUrls($entry) as $url) {
            $res .= '<link rel="modulepreload" href="'
                . get_template_directory_uri().$url
                . '">';
        }
        return $res;
    }
}

function cssTag(string $entry): string
{
    // not needed on dev, it's inject by Vite
    if (IS_DEVELOPMENT) {
        return '';
    }else{
        $tags = '';
        foreach (cssUrls($entry) as $url) {
            $tags .= '<link rel="stylesheet" href="'
                .$url
                . '">';
        }
        return $tags;
    }
}


// Helpers to locate files

function getManifest(): array
{
    $content = file_get_contents(__DIR__ . '/dist/manifest.json');

    return json_decode($content, true);
}

function assetUrl(string $entry): string
{
    $manifest = getManifest();

    return isset($manifest[$entry])
        ? get_template_directory_uri().'/dist/' . $manifest[$entry]['file']
        : '';
}

function importsUrls(string $entry): array
{
    $urls = [];
    $manifest = getManifest();

    if (!empty($manifest[$entry]['imports'])) {
        foreach ($manifest[$entry]['imports'] as $imports) {
            $urls[] = '/dist/' . $manifest[$imports]['file'];
        }
    }
    return $urls;
}

function cssUrls(string $entry): array
{
    $urls = [];
    $manifest = getManifest();

    if (!empty($manifest[$entry]['css'])) {
        foreach ($manifest[$entry]['css'] as $file) {
            $urls[] = '/dist/' . $file;
        }
    }
    return $urls;
}

function ponzo_enqueue(){
    
}

add_action('wp_enqueue_scripts', 'ponzo_enqueue');
