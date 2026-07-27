<?php
// Script to convert storage/app/public/escudos/default.png to public/favicon.ico
// Usage: php scripts/convert_favicon.php

$base = __DIR__ . '/..';
$source = $base . '/storage/app/public/escudos/default.png';
$publicIco = $base . '/public/favicon.ico';
$publicPng = $base . '/public/favicon.png';

if (!file_exists($source)) {
    echo "Source image not found: $source\n";
    exit(1);
}

// Try ImageMagick `convert` first
exec('convert -version 2>&1', $out, $rc);
if ($rc === 0) {
    $cmd = 'convert ' . escapeshellarg($source) . ' -define icon:auto-resize=64,48,32,16 ' . escapeshellarg($publicIco) . ' 2>&1';
    exec($cmd, $out2, $rc2);
    if ($rc2 === 0) {
        echo "Created favicon: $publicIco\n";
        exit(0);
    }
    echo "ImageMagick convert failed:\n" . implode("\n", $out2) . "\n";
}

// Fallback: copy PNG to public/favicon.png
if (@copy($source, $publicPng)) {
    echo "ImageMagick not available. Copied PNG to: $publicPng\n";
    echo "Browsers will use this if referenced; to create a true .ico install ImageMagick and run:\n";
    echo "convert $source -define icon:auto-resize=64,48,32,16 $publicIco\n";
    exit(0);
}

echo "Failed to copy source to public. Check permissions.\n";
exit(1);
