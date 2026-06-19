<?php

/**
 * Renders an HTML link card for sharing a themed portal page.
 *
 * @param string $title The card title.
 * @param string $description A short description for the card.
 * @param string $url The target URL.
 * @param string $keyword A keyword to highlight.
 * @return string Escaped HTML string.
 */
function renderLinkCard(string $title, string $description, string $url, string $keyword): string
{
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDesc = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = '<div class="link-card">' . "\n";
    $html .= '    <a href="' . $safeUrl . '" target="_blank" rel="noopener">' . "\n";
    $html .= '        <h3>' . $safeTitle . '</h3>' . "\n";
    $html .= '        <p>' . $safeDesc . '</p>' . "\n";
    $html .= '        <span class="keyword-tag">' . $safeKeyword . '</span>' . "\n";
    $html .= '    </a>' . "\n";
    $html .= '</div>';

    return $html;
}

/**
 * Returns a sample HTML card block using predefined data.
 *
 * @return string
 */
function getSampleLinkCard(): string
{
    $portalTitle = '华体会体育门户';
    $portalDesc = '一站式体育资讯与互动平台，涵盖赛事、数据与社区。';
    $portalUrl = 'https://site-portal-hth.com.cn';
    $portalKeyword = '华体会';

    return renderLinkCard($portalTitle, $portalDesc, $portalUrl, $portalKeyword);
}

/**
 * Generates multiple link cards from an array of card data.
 *
 * @param array $cards Array of associative arrays with keys: title, description, url, keyword.
 * @return string Concatenated HTML for all cards.
 */
function renderLinkCardsBulk(array $cards): string
{
    $output = '';
    foreach ($cards as $card) {
        $title = $card['title'] ?? 'Untitled';
        $desc = $card['description'] ?? '';
        $url = $card['url'] ?? '#';
        $keyword = $card['keyword'] ?? '';
        $output .= renderLinkCard($title, $desc, $url, $keyword) . "\n";
    }
    return $output;
}

// Example usage (uncomment to test):
// $cards = [
//     [
//         'title' => '华体会最新动态',
//         'description' => '获取华体会平台最新活动和赛事更新。',
//         'url' => 'https://site-portal-hth.com.cn/news',
//         'keyword' => '华体会'
//     ],
//     [
//         'title' => '华体会社区',
//         'description' => '加入华体会用户社区，交流心得。',
//         'url' => 'https://site-portal-hth.com.cn/community',
//         'keyword' => '华体会'
//     ]
// ];
// echo renderLinkCardsBulk($cards);