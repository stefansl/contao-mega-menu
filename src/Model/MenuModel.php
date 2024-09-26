<?php

/**
 * mega_menu extension for Contao Open Source CMS
 *
 * Copyright (C) 2016 derhaeuptling
 *
 * @author  derhaeuptling <https://derhaeuptling.com>
 * @author  Codefog <http://codefog.pl>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */

namespace Derhaeuptling\ContaoMegaMenu\Model;

use Contao\ContentModel;
use Contao\Model;
use Contao\Model\Collection;
use Contao\PageModel;


/**
 * add properties for IDE support
 *
 * @property int $id
 * @propery string $template
 */
class MenuModel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_mega_menu';

    /**
     * Get the content elements
     */
    public function getContentElements(): ContentModel | Collection | null
    {
        return ContentModel::findPublishedByPidAndTable($this->id, static::getTable());
    }

    /**
     * Find the record by page ID
     */
    public static function findByPage(int $pageId): ?MenuModel
    {
        if (($pageModel = PageModel::findByPk($pageId)) === null
            || !$pageModel->megamenu_enable
        ) {
            return null;
        }

        dump($pageModel->megamenu_menu);

        return static::findByPk($pageModel->megamenu_menu);
    }
}
