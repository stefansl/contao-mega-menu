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

/**
 * Table tl_mega_menu
 */

use Contao\DC_Table;

$GLOBALS['TL_DCA']['tl_mega_menu'] = [

    // Config
    'config'   => [
        'dataContainer'    => DC_Table::class,
        'enableVersioning' => true,
        'switchToEdit'     => true,
        'ctable'           => ['tl_content'],
        'sql'              => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
    ],

    // List
    'list'     => [
        'sorting'           => [
            'mode'        => 1,
            'fields'      => ['name'],
            'flag'        => 1,
            'panelLayout' => 'filter;search,limit',
        ],
        'label'             => [
            'fields' => ['name'],
            'format' => '%s',
        ],
        'global_operations' => [
            'all'
        ],
        'operations'        => [
            'edit',
            'children',
            'copy',
            'delete',
            'show',
        ],
    ],

    // Palettes
    'palettes' => [
        'default' => '{name_legend},name,template',
    ],

    // Fields
    'fields'   => [
        'id'       => [
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ],
        'tstamp'   => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'name'     => [
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'template' => [
            'default'          => 'mega_menu_default',
            'exclude'          => true,
            'inputType'        => 'select',
            'eval'             => ['tl_class' => 'w50'],
            'sql'              => "varchar(255) NOT NULL default ''",
        ],
    ],
];
