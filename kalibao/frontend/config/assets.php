<?php
/**
 * Configuration file
 */

// In the console environment, some path aliases may not exist. Please define these:
Yii::setAlias('@webroot', __DIR__ . '/../web');
Yii::setAlias('@web', '/');

return [
    // Adjust command/callback for JavaScript files compressing:
    'jsCompressor' => 'java -jar kalibao/compiler/compiler.jar --js {from} --js_output_file {to}',
    // Adjust command/callback for CSS files compressing:
    'cssCompressor' => 'java -jar kalibao/compiler/yuicompressor.jar --type css {from} -o {to}',
    // The list of asset bundles to compress:
    'bundles' => [
        'yii\\web\\JqueryAsset',
        'yii\\web\\YiiAsset',
        'yii\\bootstrap\\BootstrapAsset',
        'yii\\bootstrap\\BootstrapPluginAsset',
        'yii\\captcha\\CaptchaAsset',
        'yii\\widgets\\ActiveFormAsset',
        'yii\\validators\\ValidationAsset',
        'yii\\jui\\JuiAsset',
        'kalibao\\common\\components\\web\\BlockUIAsset',
        'kalibao\\common\\components\\crud\\CrudAsset',
        'kalibao\\frontend\\components\\web\\AppAsset',
    ],
    // Asset bundle for compression output:
    'targets' => [
        'all' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'js' => 'js/all-{hash}.js',
            'css' => 'css/all-{hash}.css',
            'depends' => [
                'yii\\web\\JqueryAsset',
                'yii\\web\\YiiAsset',
                'yii\\bootstrap\\BootstrapAsset',
                'yii\\bootstrap\\BootstrapPluginAsset',
                'yii\\captcha\\CaptchaAsset',
                'yii\\widgets\\ActiveFormAsset',
                'yii\\validators\\ValidationAsset',
                'yii\\jui\\JuiAsset',
                'kalibao\\common\\components\\web\\BlockUIAsset',
                'kalibao\\frontend\\components\\web\\AppAsset',
            ]
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
    ],
];