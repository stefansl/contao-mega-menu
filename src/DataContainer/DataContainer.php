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

namespace Derhaeuptling\ContaoMegaMenu\DataContainer;

use Contao\Controller;
use Contao\Message;

class DataContainer
{
    /**
     * Display the hint
     */
    public function displayHint(): void
    {
        Message::addInfo($GLOBALS['TL_LANG']['tl_mega_menu']['hint']);
    }
}
