<?php
// Quick test to see if homepage loads

ob_start();
require __DIR__ . '/index.php';
$output = ob_get_clean();

// Remove deprecation warnings
$output = preg_replace('/<br \/>\s*<b>Deprecated<\/b>:.*?<br \/>/s', '', $output);

// Check if we have products
if (strpos($output, 'product') !== false) {
    echo "✓ Products found in output\n";
}

// Check if we have a title
if (strpos($output, '<title>') !== false) {
    echo "✓ Title tag found\n";
}

// Check for specific product
if (strpos($output, 'Overalt skal jeg') !== false) {
    echo "✓ Test product found\n";
}

// Show first 2000 chars of cleaned output
echo "\n--- OUTPUT PREVIEW ---\n";
echo substr(strip_tags($output), 0, 2000);