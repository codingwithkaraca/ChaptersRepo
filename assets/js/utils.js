function objToString(obj) {
    var arr = [];
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            arr.push(p + ':' + obj[p]);
        }
    }
    return arr.join(';');
}

function objToCssStyle(obj, prefix) {
    var arr = [];
    prefix = _.isUndefined(prefix) ? "" : prefix.trim() + " ";
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            arr.push(prefix + p + '{' + objToString(obj[p]).split("\"").join("").split(",").join(";") + '}');
        }
    }
    return "<style>" + arr.join('') + "</style>";
}

function getUniqId(length) {

    length = _.isUndefined(length) ? 10 : parseInt(length);
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function hideEmptyMenu() {
    $(".main-dropdown-content-link").not(":has(li)").prev('a').each(function (i, o) {
        if ($(o).attr('href') == '#' || $(o).attr('href') == '') {
            $(o).parent().remove();
        }
    });
}

function setMenuPosition() {
    $(".white-menu .main-sub-menu").each(function (i, obj) {
        var li_count = $(obj).find('>li').length;
        var li_cls_count = $(obj).find('>li[class]').length;

        if (li_cls_count === 0 && li_count < 4) {
            var diff = 4 - li_count;
            var li_width = diff * 12;//12%
            var $li = $("<li/>");
            $li.css('width', li_width + '%')
            $(obj).prepend($li);
        }
    });
}