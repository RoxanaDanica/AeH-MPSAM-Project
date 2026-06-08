<?php
/**
 * Helpers pentru rendering layout
 * 
 * Folosire în pagini:
 *   renderHeader('Titlu pagină', 'pacienti'); // 'pacienti' = activeMenu
 *   ...conținut HTML...
 *   renderFooter();
 */

/**
 * Renderizează header + sidebar
 * @param string $title - titlu pagină (afișat în <title> și h1)
 * @param string $activeMenu - cheia meniului activ (ex: 'pacienti', 'consultatii')
 */
function renderHeader($title = '', $activeMenu = '') {
    $GLOBALS['_page_title'] = $title;
    $GLOBALS['_active_menu'] = $activeMenu;
    
    require_once __DIR__ . '/../includes/header.php';
    
    // Sidebar afișat doar dacă utilizatorul e logat
    if (isLoggedIn()) {
        require_once __DIR__ . '/../includes/sidebar.php';
    }
}

/**
 * Renderizează footer
 */
function renderFooter() {
    require_once __DIR__ . '/../includes/footer.php';
}

/**
 * Renderizează mesajele flash (success/error/warning/info)
 * Folosire în pagini, după renderHeader:
 *   renderFlash();
 */
function renderFlash() {
    $messages = getFlash();
    if (empty($messages)) return;
    
    foreach ($messages as $msg) {
        $type = e($msg['type']);
        $text = e($msg['message']);
        echo "<div class=\"flash flash-{$type}\">{$text}</div>";
    }
}

/**
 * Returnează titlu pagină curent
 */
function pageTitle() {
    return $GLOBALS['_page_title'] ?? APP_NAME;
}

/**
 * Returnează meniul activ curent
 */
function activeMenu() {
    return $GLOBALS['_active_menu'] ?? '';
}
