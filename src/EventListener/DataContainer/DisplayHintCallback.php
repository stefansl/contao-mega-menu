<?php

namespace Derhaeuptling\ContaoMegaMenu\EventListener\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Contao\Message;

#[AsCallback(table: 'tl_mega_menu', target: 'config.onload')]
class DisplayHintCallback
{
    public function __invoke(DataContainer $dc = null): void
    {
        Message::addInfo($GLOBALS['TL_LANG']['tl_mega_menu']['hint']);
    }
}
