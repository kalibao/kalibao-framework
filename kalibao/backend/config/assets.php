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
        'kalibao\\common\\components\\web\\Html5IE8SupportAsset',
        'kalibao\\common\\components\\web\\FontAwesomeAsset',
        'kalibao\\backend\\components\\web\\AdminLTEAsset',
        'yii\\widgets\\ActiveFormAsset',
        'yii\\validators\\ValidationAsset',
        'yii\\jui\\JuiAsset',
        'kalibao\\common\\components\\web\\BlockUIAsset',
        'kalibao\\common\\components\\web\\AppAsset',
        'kalibao\\common\\components\\crud\\CrudAsset',
        'kalibao\\backend\\components\\web\\CrudAsset',
        'kalibao\\backend\\components\\web\\AppAsset',
        'kalibao\\backend\\modules\\message\\components\\message\\web\\MessageAsset',
        'kalibao\\backend\\modules\\rbac\\components\\rbacPermissionRole\\web\\RbacPermissionRoleAsset',
        'kalibao\\backend\\modules\\mail\\components\\mailTemplate\\web\\MailTemplateAsset',
        'kalibao\\backend\\modules\\mail\\components\\mailSendingRole\\web\\MailSendingRoleAsset',
        'kalibao\\backend\\modules\\cms\\components\\cmsPage\\web\\CmsPageAsset',
        'kalibao\\backend\\modules\\cms\\components\\cmsImage\\web\\CmsImageAsset',
        'kalibao\\backend\\modules\\cms\\components\\cmsSimpleMenuGroup\\web\\CmsSimpleMenuGroupAsset',
        'kalibao\\backend\\modules\\cms\\components\\cmsSimpleMenu\\web\\CmsSimpleMenuAsset',
        'kalibao\\backend\\modules\\dashboard\\components\\dashboard\\web\\DashboardAsset'
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
                'kalibao\\common\\components\\web\\Html5IE8SupportAsset',
                'kalibao\\common\\components\\web\\FontAwesomeAsset',
                'kalibao\\backend\\components\\web\\AdminLTEAsset',
                'yii\\widgets\\ActiveFormAsset',
                'yii\\validators\\ValidationAsset',
                'yii\\jui\\JuiAsset',
                'kalibao\\common\\components\\web\\BlockUIAsset',
                'kalibao\\common\\components\\web\\AppAsset',
                'kalibao\\common\\components\\crud\\CrudAsset',
                'kalibao\\backend\\components\\web\\CrudAsset',
                'kalibao\\backend\\components\\web\\AppAsset',
                'kalibao\\backend\\modules\\message\\components\\message\\web\\MessageAsset',
                'kalibao\\backend\\modules\\rbac\\components\\rbacPermissionRole\\web\\RbacPermissionRoleAsset',
                'kalibao\\backend\\modules\\mail\\components\\mailTemplate\\web\\MailTemplateAsset',
                'kalibao\\backend\\modules\\mail\\components\\mailSendingRole\\web\\MailSendingRoleAsset',
                'kalibao\\backend\\modules\\cms\\components\\cmsPage\\web\\CmsPageAsset',
                'kalibao\\backend\\modules\\cms\\components\\cmsImage\\web\\CmsImageAsset',
                'kalibao\\backend\\modules\\cms\\components\\cmsSimpleMenuGroup\\web\\CmsSimpleMenuGroupAsset',
                'kalibao\\backend\\modules\\cms\\components\\cmsSimpleMenu\\web\\CmsSimpleMenuAsset',
                'kalibao\\backend\\modules\\dashboard\\components\\dashboard\\web\\DashboardAsset'
            ]
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
    ],
];