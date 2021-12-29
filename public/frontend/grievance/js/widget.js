jQuery(document).ready(function($){

    $.fn.ssoWidget =function ssoWidget(option) {

        function absFileLoc(filename) {
            var scriptElements = document.getElementsByTagName('script');
            for (var i = 0; i < scriptElements.length; i++) {
                var source = scriptElements[i].src;
                if (source.indexOf(filename) > -1) {
                    var location = source.substring(0, source.indexOf(filename)) + filename;
                    return location;
                }
            }
            return false;
        }

        var url = absFileLoc('widget.js');
        url = url.split('?');
        url = url[0];
        url = url.replace('js/widget.js', '');
        url = url + 'apps';
        var ele = $(this);
        $.ajax({
            type: 'POST',
            url: url,
            data: { 'data': option, 'domain': window.location.hostname },
            beforeSend: function () {
            },
            success: function (data) {
                ele.html(data);
                ele.find('.sso-icon').on('click',function(){
                    ele.find('.apps-icon').toggle();
                });
            }
        });
    }
});
