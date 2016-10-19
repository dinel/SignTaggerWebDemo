/* 
 * Copyright 2016 dinel
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/* global stats, key */

$( document ).ready(function() {
    for(key in stats) {
        $("#count-" + key).html("(<b>" + stats[key] + "</b>)");
        $("#count-" + key).addClass('text-danger');
    };
    $('#help-info').hide();
    var helpOn = false;
    
    $('#help-messages').hide();
    $('#context-help>.help-message').hide();
    
    $("#selectors").on('change', ':checkbox', function() {
        var type = $(this).attr('id').substring(4);
        if(this.checked)  {           
            $("." + type).addClass('sign');
            $(".label-" + type).show();
        } else {
            $("." + type).removeClass('sign');         
            $("." + type).addClass('token');
            $(".label-" + type).hide();
        }
    });
    
    $("#select-all").click(function() {
        $('.filter').prop("checked", true);
        $('.sign-label').show();
        $('.sign-label').prev().addClass('sign');
    });
    
    $("#select-none").click(function() {
        $('.filter').prop("checked", false);        
        $('.sign-label').prev().addClass('token');
        $('.sign-label').prev().removeClass('sign');
        $('.sign-label').hide();
    });
    
    $('.filter').parent().mouseenter(function() {
        if(helpOn) {
            var type = $(this).children().first().attr('id').substring(4);
            $(this).append('<span id="id-' + type 
                    + '" class="help"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-question-sign"></span> More info</button></span>');
        }
    });
    
    $('.filter').parent().mouseleave(function() {
        if(helpOn) {
            $(this).children().last().remove();
        }
    });
    
    $('#selectors').on('click', '.help', function() {
        $('#help-messages').show();
        $('#context-help>.help-message').hide();
        $('#help-' + $(this).attr('id').substring(3)).show();
    });
    
    $('#show-help').change(function() {
        if($(this).is(':checked')) {
            helpOn = true;
            $('#help-info').show();
        } else {
            helpOn = false;
            $('#help-info').hide();
            $('#help-messages').hide();
        }
    });
    
    $('#close-help-area').click(function() {
        $('#help-messages').hide();
    });
});