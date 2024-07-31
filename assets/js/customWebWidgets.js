CWW_TYPE =
    {
        LIST: "cww_list",
        LINK_LIST: "cww_link_list",
        TABLE: "cww_table",
        BUTTON: "cww_button",
        PROFILE: 'cww_profile',
    };

(function () {
    var $widgets = $("customwebwidget");
    if ($widgets.length > 0) {
        console.log("FIND :::::::::: customwebwidget :::::::::");
        _.each($widgets, function ($widget) {
            run_cww($($widget));
        });
    }
}(jQuery));

function run_cww($widget) {

    try {
        switch ($widget.data("type")) {
            case CWW_TYPE.LIST:
                console.log("FIND :::::::::: cww_list");
                cww_list($widget);
                break;
            case CWW_TYPE.LINK_LIST:
                console.log("FIND :::::::::: cww_link_list");
                cww_link_list($widget);
                break;
            case CWW_TYPE.TABLE:
                console.log("FIND :::::::::: cww_table");
                cww_table($widget);
                break;
            case CWW_TYPE.BUTTON:
                console.log("FIND :::::::::: cww_button");
                cww_button($widget);
                break;
            case CWW_TYPE.PROFILE:
                console.log("FIND :::::::::: cww_profile");
                cww_profile($widget);
                break;
            default:
                break;
        }
    } catch (e) {
        console.error("ERROR :::: run_cww :::: CWW TYPE : " + $widget.data("type") + " | " + e.toString());
    }
}

function cww_list($obj) {
    cww_set_template($obj, '#template_cww_list');
}

function cww_link_list($obj) {
    cww_set_template($obj, '#template_cww_link_list');
}

function cww_table($obj) {
    cww_set_template($obj, '#template_cww_table');
}

function cww_button($obj) {
    cww_set_template($obj, '#template_cww_button');
}

function cww_profile($obj) {
    cww_set_template($obj, '#template_cww_profile');
}

function cww_set_template($obj, selector) {
    try {
        var model = $obj.data("model");
        var style = $obj.data("style");
        var option = $obj.data("option");
        var id = $obj.data("id");

        var tmp = document.querySelector(selector);
        var tmp_str = tmp.innerHTML;
        var template = _.template(tmp_str);
        var col_size=Math.floor(100/model.length);

        $obj.replaceWith(template({cww_id: id, model: model, style: style, option: option,col_size:col_size}));
    } catch (e) {
        console.error("ERROR :::: cww_set_template :::: CWW TYPE : " + $obj.data("type") + " | " + e.toString());
    }
}
