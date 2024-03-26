jQuery(document).ready(function ($) {

  $('.index_employee').click(function (e) {
    e.preventDefault();
    effect($(this), 'index')
  })

  $('.list_employee_action').click(function (e) {
    e.preventDefault();
    effect($(this), 'list')
  })

});

function effect(element, action) {

  let employee_link = 'employee__link__' + action
  let employee_icon = 'employee__icon__' + action
  let employee_icon_active = 'employee__icon__' + action + '__active'

  if (element.parent().children('div').is('.is-show')) {

    element.parent().children('div').removeClass('is-show')

    setTimeout(function () {
      element.parent().find('.' + employee_link)
          .removeClass(employee_icon_active)
          .addClass(employee_icon)
    }, 200);

    return
  }

  element.parent().find('.' + employee_link)
      .removeClass(employee_icon)
      .addClass(employee_icon_active)

  element.parent().children('div').addClass('is-show')
}