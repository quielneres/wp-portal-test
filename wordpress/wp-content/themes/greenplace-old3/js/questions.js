
jQuery(document).ready(function ($) {

    $('.index_question').click(function (e) {
        e.preventDefault();
        effect($(this), 'index')
    })

    $('.list_question_action').click(function (e) {
        e.preventDefault();
        effect($(this), 'list')
    })

});

function effect(element, action) {

    let question_link = 'question__link__' + action
    let question_icon = 'question__icon__' + action
    let question_icon_active = 'question__icon__' + action + '__active'

    if (element.parent().children('div').is('.is-show')) {

        element.parent().children('div').removeClass('is-show')

        setTimeout(function () {
            element.parent().find('.' + question_link)
                .removeClass(question_icon_active)
                .addClass(question_icon)
        }, 200);

        return
    }

    element.parent().find('.' + question_link)
        .removeClass(question_icon)
        .addClass(question_icon_active)

    element.parent().children('div').addClass('is-show')
}