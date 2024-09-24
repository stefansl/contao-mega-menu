<?php

namespace Derhaeuptling\MegaMenu;

use Contao\ContentModel;
use Contao\Controller;
use Contao\FrontendTemplate;
use Derhaeuptling\MegaMenu\Model\MenuModel;

class Generator
{
    /**
     * Outsiders
     */
    private static array $outsiders = [];

    /**
     * Add the outsider buffer
     */
    public static function addOutsider(string $buffer): void
    {
        static::$outsiders[] = $buffer;
    }

    /**
     * Return true if there are outsiders
     */
    public static function hasOutsiders(): bool
    {
        return count(static::$outsiders) > 0;
    }

    /**
     * Get the outsiders
     */
    public static function getOutsiders(): array
    {
        return static::$outsiders;
    }

    /**
     * Generate the menus for the page
     */
    public static function generate(int $pageId): string
    {
        if (($menu = static::getMenuModel($pageId)) === null) {
            return '';
        }

        $template     = new FrontendTemplate($menu->template);
        $template->id = $pageId;

        $buffer = [];

        // Generate content elements
        if (($contentModels = $menu->getContentElements()) !== null) {
            /** @var ContentModel $contentModel */
            foreach ($contentModels as $contentModel) {
                $buffer[] = Controller::getContentElement($contentModel);
            }
        }

        $template->buffer = implode("\n", $buffer);

        return $template->parse();
    }

    /**
     * Return true if the page has menus
     */
    public static function has(int $pageId): bool
    {
        return static::getMenuModel($pageId) !== null;
    }

    /**
     * Get the menu model
     */
    private static function getMenuModel(int $pageId): ?MenuModel
    {
        return MenuModel::findByPage($pageId);
    }
}
