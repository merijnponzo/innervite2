<?php
// Helpers here serve as example. Change to suit your needs.

// For a real-world example check here:
// https://github.com/wp-bond/bond/blob/master/src/Tooling/Vite.php
// https://github.com/wp-bond/boilerplate/tree/master/app/themes/boilerplate

// on the links above there is also example for @vitejs/plugin-legacy


// Some dev/prod mechanism would exist in your project
// Handling manualy here, change to test both cases
define('IS_DEVELOPMENT', false);


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
