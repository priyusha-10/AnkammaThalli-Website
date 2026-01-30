<?php
// app/models/PageSection.php

require_once __DIR__ . '/../core/Database.php';

class PageSection {
    public static function getContent($pageSlug, $sectionKey) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT content_text, image_url FROM page_sections WHERE page_slug = ? AND section_key = ?");
        $stmt->execute([$pageSlug, $sectionKey]);
        return $stmt->fetch();
    }
}
