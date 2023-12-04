<?php
global $totalPages;
global $page;
global $activeClass;
// Display pagination links
echo '<div class="pagination">';
if ($page > 1) {
    echo '<a href="?page=' . ($page - 1) . '">Previous</a>';
}

for ($i = 1; $i <= $totalPages; $i++) {
    $activeClass = ($i == $page) ? 'class="current"' : '';
    echo '<a ' . $activeClass . ' href="?page=' . $i . '">' . $i . '</a>';
}

if ($page < $totalPages) {
    echo '<a href="?page=' . ($page + 1) . '">Next</a>';
}
echo '</div>';
