<?php
/**
 * Этот файл является частью расширения модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Config\Page\Controller;

use Ge;
use Ge\Panel\Helper\ExtForm;
use Ge\Panel\Widget\EditWindow;
use Rg\Backend\Config\Controller\ServiceForm;

/**
 * Контроллер конфигурации службы "Информация о сайте".
 * 
 * Cлужба {@see \Ge\Site\Page}.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Config\Page\Controller
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * Возвращает элементы панели формы (Ge.view.form.Panel GeJS).
     * 
     * @return array
     */
    protected function getFormItems(): array
    {
        /** @var \Ge\Page\Page $service */
        $service = Ge::$app->page;
        $editionName = Ge::$app->version->getEdition()->name;
        /** @var array $meta */
        $meta = $service->meta;
        return [
            ExtForm::languageTabs(function ($tag) use ($service, $editionName, $meta) {
                if ($tag && isset($meta[$tag]))
                    $meta = $meta[$tag];
                else
                    $meta = [];
                return [
                    [
                        'xtype'      => 'textfield',
                        'baseCls'    => 'g-form__field',
                        'fieldLabel' => '#Title pattern',
                        'note'       => '#the title of the article or page is substituted into the template',
                        'name'       => $tag ? 'meta[' . $tag. '][titlePattern]' : 'titlePattern',
                        'maxLength'  => 255,
                        'emptyText'  => '%s - '. $editionName,
                        'value'      =>  $tag ? ($meta['titlePattern'] ?? '') : $service->titlePattern,
                    ],
                    [
                        'xtype'      => 'textfield',
                        'baseCls'    => 'g-form__field',
                        'fieldLabel' => '#Title',
                        'name'       => $tag ? 'meta[' . $tag. '][title]' : 'title',
                        'note'       => '#defines the title of the document that is displayed in the browser window title or page tab',
                        'maxLength'  => 255,
                        'emptyText'  => $editionName,
                        'value'      => $tag ? ($meta['title'] ?? '') : $service->title,
                    ],
                    [
                        'xtype'      => 'textfield',
                        'baseCls'    => 'g-form__field',
                        'fieldLabel' => '#Author',
                        'name'       => $tag ? 'meta[' . $tag. '][author]' : 'author',
                        'note'       => '#authors name (if not specified, will be substituted from the article)',
                        'maxLength'  => 255,
                        'value'      => $tag ? ($meta['author'] ?? '') : $service->author
                    ],
                    [
                        'xtype'      => 'textarea',
                        'baseCls'    => 'g-form__field',
                        'fieldLabel' => '#Keywords',
                        'name'       => $tag ? 'meta[' . $tag. '][keywords]' : 'keywords',
                        'note'       => '#search engines are used to determine the relevance of a link',
                        'height'     => 100,
                        'emptyText'  => $editionName,
                        'value'      => $tag ? ($meta['keywords'] ?? '') : $service->keywords,
                    ],
                    [
                        'xtype'      => 'textarea',
                        'baseCls'    => 'g-form__field',
                        'fieldLabel' => '#Description',
                        'name'       => $tag ? 'meta[' . $tag. '][description]' : 'description',
                        'note'       => '#used by search engines for indexing, as well as when creating annotations in the search results',
                        'height'     => 100,
                        'emptyText'  => $editionName,
                        'value'      => $tag ? ($meta['description'] ?? '') : $service->description,
                    ],
                    [
                        'xtype'      => 'textfield',
                        'baseCls'    => 'g-form__field',
                        'fieldLabel' => '#Image',
                        'name'       => $tag ? 'meta[' . $tag. '][image]' : 'image',
                        'note'       => '#logo, image used in social media posts',
                        'maxLength'  => 255,
                        'value'      => $tag ? ($meta['image'] ?? '') : $service->image
                    ],
                    [
                        'xtype'      => 'combobox',
                        'fieldLabel' => '#Indexing',
                        'note'       => '#indexing of the site in search engines by robots',
                        'name'       => $tag ? 'meta[' . $tag. '][robots]' : 'robots',
                        'store'      => [
                            'fields' => ['value', 'title'],
                            'data'   => [
                                ['all', 'all'],
                                ['none', 'none'],
                                ['index, follow', 'index, follow'],
                                ['index, nofollow', 'index, nofollow'],
                                ['noindex, nofollow', 'noindex, nofollow'],
                                ['noindex', 'noindex'],
                                ['nofollow', 'nofollow']
                            ]
                        ],
                        'displayField' => 'title',
                        'valueField'   => 'value',
                        'value'        => $tag ? ($meta['robots'] ?? '') : $service->robots,
                        'queryMode'    => 'local',
                        'editable'     => false
                    ]
                ];
            }, true, [], [
                'defaults'    => [
                    'labelAlign' => 'right',
                    'labelWidth' => 350,
                    'width'     => '100%'
                ]
            ]),
            [
                'xtype' => 'label',
                'ui'    => 'note',
                'html'  => '#The above parameters, such as: "Author", "Image", "Indexing" will be applied to the pages and articles of the site in which they are absent',
                'style' => 'margin-bottom:20px',
            ],
            [
                'xtype'    => 'fieldset',
                'title'    => '#Website micromarking for search engines',
                'margin'   => 5,
                'layout'   => 'column',
                'defaults' => [
                    'labelAlign' => 'right',
                    'labelWidth' => 170
                ],
                'items' => [
                    [
                        'columnWidth' => '0.25',
                        'items' => [
                            [
                                'xtype'      => 'checkbox',
                                'fieldLabel' => '#Open Graph markup',
                                'name'       => 'useOpenGraph',
                                'labelAlign' => 'right',
                                'checked'    => $service->useOpenGraph,
                                'ui'         => 'switch'
                            ]
                        ]
                    ],
                    [
                        'columnWidth' => '0.25',
                        'items' => [
                            [
                                'xtype'      => 'checkbox',
                                'fieldLabel' => '#Twitter Card markup',
                                'name'       => 'useTwitterCard',
                                'labelAlign' => 'right',
                                'checked'    => $service->useTwitterCard,
                                'ui'         => 'switch'
                            ],
                        ]
                    ],
                    [
                        'columnWidth' => '0.25',
                        'items' => [
                            [
                                'xtype'      => 'checkbox',
                                'fieldLabel' => '#Schema.org markup',
                                'name'       => 'useSchemaOrg',
                                'labelAlign' => 'right',
                                'checked'    => $service->useSchemaOrg,
                                'ui'         => 'switch'
                            ]
                        ]
                    ],
                    [
                        'columnWidth' => '0.25',
                        'items' => [
                            [
                                'xtype'      => 'checkbox',
                                'fieldLabel' => '#VK markup',
                                'name'       => 'useVKSchema',
                                'labelAlign' => 'right',
                                'checked'    => $service->useVKSchema,
                                'ui'         => 'switch'
                            ]
                        ]
                    ]
                ]
            ],
            [
                'xtype'    => 'fieldset',
                'title'    => '#Application signature',
                'margin'   => 5,
                'defaults' => [
                    'labelAlign' => 'right',
                    'labelWidth' => 170
                ],
                'items' => [
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#in HTML page',
                        'name'       => 'useMetaGenerator',
                        'boxLabel'   => '#meta tag "GENERATOR"',
                        'checked'    => $service->useMetaGenerator,
                        'ui'         => 'switch'
                    ],
                    [
                        'xtype' => 'label',
                        'ui'    => 'comment',
                        'html'  => $this->module->t('Signature:') . ' ' . Ge::$app->version->getGenerator()
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#in the HTTP header',
                        'name'       => 'useHeaderPowered',
                        'boxLabel'   => $this->module->t('parameter') . ' "' . (\Ge\Http\Response::HEADER_POWERED) . '"',
                        'checked'    => $service->useHeaderPowered,
                        'ui'         => 'switch'
                    ],
                    [
                        'xtype' => 'label',
                        'ui'    => 'comment',
                        'html'  => $this->module->t('Signature:') . ' ' . Ge::$app->version->getPoweredBy()
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#sign as',
                        'name'       => 'textPowered',
                        'style'      => 'margin-top:7px;',
                        'anchor'     => '100%',
                        'maxLength'  => 255,
                        'value'      => $service->textPowered
                    ]
                ]
            ],
            [
                'xtype'  => 'toolbar',
                'dock'   => 'bottom',
                'border' => 0,
                'style'  => ['borderStyle' => 'none'],
                'items'  => [
                    [
                        'xtype'    => 'checkbox',
                        'boxLabel' => $this->module->t('reset settings'),
                        'name'     => 'reset',
                        'ui'       => 'switch'
                    ]
                 ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createWidget(): EditWindow
    {
        /** @var EditWindow $window */
        $window = parent::createWidget();

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $window->width = 700;
        $window->height = 730;
        $window->form->bodyPadding = 1;

        // панель формы (Ge.view.form.Panel GeJS)
        $window->form->autoScroll = true;
        $window->form->items = $this->getFormItems();
        $window->form->setStateButtons($window->form::STATE_UPDATE, [
            'help' => ['subject' => 'index'], 'save', 'cancel'
        ]);
        $window->responsiveConfig = [
            'height < 730' => ['height' => '99%'],
            'width < 700' => ['width' => '99%'],
        ];
        return $window;
    }
}
