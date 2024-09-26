<?php
namespace Derhaeuptling\ContaoMegaMenu\EventListener\DataContainer;

use Contao\Controller;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;

#[AsCallback('tl_mega_menu', 'fields.template.options')]
class OptionsCallback
{
    public function __invoke(DataContainer|null $dc = null): array
    {
        return Controller::getTemplateGroup('mega_menu_');
    }
}