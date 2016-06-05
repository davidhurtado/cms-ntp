<?php

namespace froala\froalaeditor;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class FroalaEditorWidget extends InputWidget
{
    const PLUGIN_NAME = 'FroalaEditor';

    /**
     * FroalaEditor Plugins
     * @var array
     */
    public $clientPlugins;

    /**
     * Exclude listed plugins
     * @var array
     */
    public $excludedPlugins;

    /**
     * FroalaEditor Options
     * @var array
     */
    public $clientOptions = [];

    /**
     * csrf cookie param
     * @var string
     */
    public $csrfCookieParam = '_csrfCookie';

    /**
     * @var boolean
     */
    public $render = true;

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->render) {
            if ($this->hasModel()) {
                echo Html::activeTextarea($this->model, $this->attribute, $this->options);
            } else {
                echo Html::textarea($this->name, $this->value, $this->options);
            }
        }
        $this->registerClientScript();
    }

    /**
     * register client scripts(css, javascript)
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        $this->initClientOptions();

        FroalaEditorAsset::$clientPlugins = $this->clientPlugins;
        FroalaEditorAsset::$excludedPlugins = $this->excludedPlugins;
        $asset = FroalaEditorAsset::register($view);

        //theme
        $themeType = isset($this->clientOptions['theme']) ? $this->clientOptions['theme'] : 'default';
        if ($themeType != 'default') {
            $view->registerCssFile($asset->baseUrl . "/css/themes/{$themeType}.css", ['depends' => '\froala\froalaeditor\FroalaEditorAsset']);
        }
        //language
        $langType = isset($this->clientOptions['language']) ? $this->clientOptions['language'] : 'en_gb';
        if ($langType != 'es_gb') {
            $view->registerJsFile($asset->baseUrl . "/js/languages/{$langType}.js", ['depends' => '\froala\froalaeditor\FroalaEditorAsset']);
        }

        $options = empty($this->options) ? '' : Json::encode($this->options);
        $id = $this->options['id'];

        $jsOptions = Json::encode($this->clientOptions);
        $view->registerJs("\$('#$id').froalaEditor($jsOptions);");
    }

    /**
     * client options init
     */
    protected function initClientOptions()
    {
        // KindEditor optional parameters
        $params = [
            'charCounterCount',
            'charCounterMax',
            'codeBeautifier',
            'codeMirror',
            'codeMirrorOptions',
            'colorsBackground',
            'colorsDefaultTab',
            'colorsStep',
            'colorsText',
            'direction',
            'disableRightClick',
            'editInPopup',
            'editorClass',
            'emoticonsSet',
            'emoticonsStep',
            'enter',
            'entities',
            'fileAllowedTypes',
            'fileMaxSize',
            'fileUploadMethod',
            'fileUploadParam',
            'fileUploadParams',
            'fileUploadToS3',
            'fileUploadURL',
            'fileUseSelectedText',
            'fontFamily',
            'fontFamilySelection',
            'fontSize',
            'fontSizeSelection',
            'fullPage',
            'height',
            'heightMax',
            'heightMin',
            'htmlAllowComments',
            'htmlAllowedAttrs',
            'htmlAllowedEmptyTags',
            'htmlAllowedTags',
            'htmlRemoveTags',
            'htmlSimpleAmpersand',
            'iframe',
            'iframeStyle',
            'imageAllowedTypes',
            'imageAltButtons',
            'imageDefaultAlign',
            'imageDefaultDisplay',
            'imageDefaultWidth',
            'imageEditButtons',
            'imageInsertButtons',
            'imageManagerDeleteMethod',
            'imageManagerDeleteParams',
            'imageManagerDeleteURL',
            'imageManagerLoadMethod',
            'imageManagerLoadParams',
            'imageManagerLoadURL',
            'imageManagerPageSize',
            'imageManagerPreloader',
            'imageManagerScrollOffset',
            'imageMaxSize',
            'imageMove',
            'imageMultipleStyles',
            'imagePaste',
            'imageResize',
            'imageResizeWithPercent',
            'imageSizeButtons',
            'imageStyles',
            'imageTextNear',
            'imageUploadMethod',
            'imageUploadParam',
            'imageUploadParams',
            'imageUploadToS3',
            'imageUploadURL',
            'initOnClick',
            'inlineStyles',
            'keepFormatOnDelete',
            'language',
            'lineBreakerOffset',
            'lineBreakerTags',
            'linkAlwaysBlank',
            'linkAlwaysNoFollow',
            'linkAttributes',
            'linkAutoPrefix',
            'linkConvertEmailAddress',
            'linkEditButtons',
            'linkInsertButtons',
            'linkList',
            'linkMultipleStyles',
            'linkStyles',
            'linkText',
            'multiLine',
            'paragraphFormat',
            'paragraphFormatSelection',
            'paragraphMultipleStyles',
            'paragraphStyles',
            'pasteAllowLocalImages',
            'pasteDeniedAttrs',
            'pasteDeniedTags',
            'pastePlain',
            'placeholderText',
            'requestHeaders',
            'requestWithCORS',
            'saveInterval',
            'saveMethod',
            'saveParam',
            'saveParams',
            'saveURL',
            'scrollableContainer',
            'shortcutsEnabled',
            'spellcheck',
            'tabSpaces',
            'tableCellMultipleStyles',
            'tableCellStyles',
            'tableColors',
            'tableColorsButtons',
            'tableColorsStep',
            'tableEditButtons',
            'tableInsertButtons',
            'tableInsertMaxSize',
            'tableMultipleStyles',
            'tableResizerOffset',
            'tableResizingLimit',
            'tableStyles',
            'theme',
            'toolbarBottom',
            'toolbarButtons',
            'toolbarButtonsMD',
            'toolbarButtonsSM',
            'toolbarButtonsXS',
            'toolbarInline',
            'toolbarSticky',
            'toolbarStickyOffset',
            'toolbarVisibleWithoutSelection',
            'typingTimer',
            'useClasses',
            'videoDefaultAlign',
            'videoDefaultDisplay',
            'videoEditButtons',
            'videoInsertButtons',
            'videoResize',
            'videoSizeButtons',
            'videoTextNear',
            'width',
            'zIndex',
            'key'
        ];
        $options = [];
        $options['height'] = '80px';
        $options['theme'] = 'dark';
        $options['language'] = 'en_gb';
        foreach ($params as $key) {
            if (isset($this->clientOptions[$key])) {
                $options[$key] = $this->clientOptions[$key];
            }
        }
        $this->clientOptions = $options;
    }

}