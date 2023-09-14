/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');


(function($) {
    'use strict';
    $(function() {
        var todoListItem = $('.todo-list');
        var todoListInput = $('.todo-list-input');
        $('.todo-list-add-btn').on("click", function(event) {
            event.preventDefault();

            var item = $(this).prevAll('.todo-list-input').val();

            if (item) {
                $.ajax({
                    url: "/",
                    type: "POST",
                    data: JSON.stringify({
                        text:item,
                        _token:TOKEN
                    }),
                    contentType: "app/json",
                    complete: function () {
                    }
                });
                todoListItem.append("<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>" + item + "<i class='input-helper'></i></label></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
                todoListInput.val("");
            }

        });

        todoListItem.on('change', '.checkbox', function() {
            var completed;
            if ($(this).attr('checked')) {
                $(this).removeAttr('checked');
                completed = false;
            } else {
                completed = true;
                $(this).attr('checked', 'checked');
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


            // $(this).closest("li").toggleClass('completed');

        });

        todoListItem.on('click', '.remove', function() {
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
