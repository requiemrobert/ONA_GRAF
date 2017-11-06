
var icon_warning='fa fa-warning';
var icon_info='fa fa-info';
var icon_success='fa fa-check-circle';
var icon_danger='fa fa-remove';

var alerClassinFo='info';
var alerClassSuccess='success';
var alerClassWarning='warning';
var alerClassDanger='danger';

var directionShowLeft='left';
var directionShowCenter='center';
var directionShowRight='right';

function alertaResponse(title, iconClass, classAlert, message, direction, delayTime){
            delayTime = delayTime === undefined ? '' : delayTime;
            $.notify({

                        icon: iconClass,
                        title: title,
                        message: message
            },{

                        element: 'body',
                        position: null,
                        type: classAlert,
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: false,
                        placement: {
                                    from: "top",
                                    align: direction
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 9999,
                        delay: delayTime !== '' ? delayTime : 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                                    enter: 'animated fadeInDown',
                                    exit: 'animated fadeOutUp'
                        },
                        onShow: null,
                        onShown: null,
                        onClose: null,
                        onClosed: null,
                        icon_type: 'class',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span><br> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
            });
}

