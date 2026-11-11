import $ from 'jquery';
window.$ = window.jQuery = $;

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

$(function () {
  // подтверждение удаления для всех форм с классом js-delete-form
  $('.js-delete-form').on('submit', function (e) {
    if (!window.confirm('Удалить этот автомобиль?')) {
      e.preventDefault();
    }
  });

  // автоматически скрываем зелёное уведомление через 4 секунды
  const $flash = $('.js-flash');
  if ($flash.length) {
    setTimeout(function () {
      $flash.fadeOut(400);
    }, 4000);
  }
});
