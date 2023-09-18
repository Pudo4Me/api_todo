/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

(function ($) {
    'use strict';
    $(function () {
        var todoListItem = $('.todo-list');
        var todoListInput = $('.todo-list-input');
        $('.todo-list-add-btn').on("click", function (event) {
            event.preventDefault();

            var item = $(this).prevAll('.todo-list-input').val();

            if (item) {
                $.ajax({
                    url: "/",
                    type: "POST",
                    data: JSON.stringify({
                        text: item,
                        _token: TOKEN
                    }),
                    contentType: "app/json",
                    complete: function () {
                    }
                });
                todoListItem.append("<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>" + item + "<i class='input-helper'></i></label></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
                todoListInput.val("");
            }

        });

        todoListItem.on('change', '.checkbox', function () {
            let completed;
            let parent = $(this).parent();
            if ($(this).attr('checked')) {
                $(this).removeAttr('checked');
                parent.removeClass('completed');
                completed = false;
            } else {
                completed = true;
                $(this).attr('checked', 'checked');
                parent.addClass('completed');
            }

            $.ajax({
                url: "/",
                type: "PATCH",
                data: JSON.stringify({
                    id: $(this).attr('data-id'),
                    completed: completed,
                    _token: TOKEN
                }),
                contentType: "app/json",
                complete: function () {
                }
            });


        });

        todoListItem.on('click', '.remove', function () {
            $(this).parent().remove();
            $.ajax({
                url: "/",
                type: "DELETE",
                data: JSON.stringify({
                    id: $(this).attr('data-id'),
                    _token: TOKEN
                }),
                contentType: "app/json",
                complete: function () {
                }
            });
        });

    });
})(jQuery);
