/**
 * MailTemplateList component
 *
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 * @version 1.0
 * @author Kévin Walter <walkev13@gmail.com>
 */
(function ($) {
  'use strict';

  $.kalibao.backend = $.kalibao.backend || {};
  $.kalibao.backend.mail = $.kalibao.backend.mail || {};

  /**
   * MailTemplateList component
   * @param {{}} args List of arguments
   * @constructor
   */
  $.kalibao.backend.mail.MailTemplateList = function (args) {
    for (var i in args) {
      if (this[i] !== undefined) {
        this[i] = args[i];
      }
    }
    this.init();
  };

  /**
   * Extend class
   * @type {$.kalibao.backend.crud.ListGrid}
   */
  $.kalibao.backend.mail.MailTemplateList.prototype = Object.create($.kalibao.backend.crud.ListGrid.prototype);

  /**
   * Init row actions events
   */
  $.kalibao.backend.mail.MailTemplateList.prototype.initRowActionsEvents = function ($container) {
    var self = this;

    $container.find('.btn-edit-row').on('click', function () {
      self.editRow($(this).closest('tr'));
      return false;
    });

    $container.find('.btn-update, .btn-translate').on('click', function() {
      var action = $(this).attr('href');
      var params = '';

      self.$wrapper.block(self.blockUIOptions);

      $.kalibao.core.app.ajaxQuery(
        action,
        function (json) {
          self.$main.remove();
          $('title').html(json.title);
          var $content = $(json.html);
          self.$dynamic.html($content);
          self.saveDynamicBackLink();
          $.kalibao.core.app.changeUrl(action, params);
          if (self.activeScrollAuto) {
            $.kalibao.core.app.scrollTop();
          }
          self.$wrapper.unblock();
        },
        'GET',
        params,
        'JSON',
        true
      );

      return false;
    });

    $container.find('.btn-sending-role').on('click', function() {
      var action = $(this).attr('href');
      var params = '';

      self.$wrapper.block(self.blockUIOptions);

      $.kalibao.core.app.ajaxQuery(
        action,
        function (json) {
          var $content = $('<div class="content-dynamic"></div>');
          $content.attr('data-action', action);
          $content.attr('data-params', params);

          var modal = new $.kalibao.core.Modal({
            id: 'modal-auto-' + (new Date().getTime()),
            options: 'data-backdrop="static"'
          });
          modal.$component.find('.modal-dialog').addClass('modal-lg');
          modal.setBody($content);

          $content.html(json.html);
          modal.open();

          $content.on('click', '.btn-close', function () {
            modal.close();
            return false;
          });
          self.$wrapper.unblock();
        },
        'GET',
        params,
        'JSON',
        true
      );

      return false;
    });
  };

})(jQuery);