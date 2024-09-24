<?php
namespace Derhaeuptling\ContaoMegaMenu\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;
use Derhaeuptling\ContaoMegaMenu\ContaoMegaMenuBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoMegaMenuBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}