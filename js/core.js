(function() {
    
});
let indicators = false;
function prerborss(data,vlon='Отсутсвует'){
    var arr='';
    var numArr = data.length;
    var i = 1;
    $.each(data,function(){
        var vl='';var ampers = '&';
        if(i == numArr){ampers='';}
        if(this.value == ''){vl = vlon;}else{vl = this.value;}
        arr += this.name+'='+vl+ampers;
        i++;
    });
    return arr;
}
function echoerrorauth(error){
    return $(".error").html(error).show();
}
function loadingdata(polozh){
    if(polozh == 'on'){$('.preloader').css('background','rgba(255, 255, 255, .7)').show();}
    else{$('.preloader').css('background','#FFF').hide();}
}
function numresults(lasY,newY,classes){
    var lasYr = $('.'+lasY).val(), newYr = $('.'+newY).val();
    var result = newYr - lasYr;
    if(result > 0) result="+"+result;else result=result;
    $('.'+classes).val('').val(result);
}
function numresultsKeystationSum(textpsevdarr,classes,operation='+'){
    let arrtextps = textpsevdarr.split(','),
        arrresultnum='',
        result=0,
        i=0,ii=0;
    for(i=0; i < arrtextps.length; i++){
        arrresultnum += $('.'+arrtextps[i]).val();
        if(i != arrtextps.length) arrresultnum += ',';
    }
    arrresultnum = arrresultnum.split(',');
    for(ii=0; ii < arrresultnum.length; ii++){
        result = +result + +arrresultnum[ii];
    }
    $('.'+classes).val('').val(result);
    $('.'+classes).triggerHandler('keyup');
}
function indacationKey(psevdarrint){
    let psevint = psevdarrint.split(','),
        var1,var2;
    var1 = $('.'+psevint[0]).val(),
    var2 = $('.'+psevint[1]).val();
    for(i=0; i < psevint.length; i++){
        if(var1 == var2){
            $('.tr_'+psevint[i]).removeClass('table_summEy').removeClass('table_summNo').addClass('table_summEy');
            indicators=true;
        }else{
            $('.tr_'+psevint[i]).removeClass('table_summEy').removeClass('table_summNo').addClass('table_summNo');
            indicators=false;
        }  
    }
    return false;
}
/*Клики для меню*/
function authuser(){
    loadingdata('on');
    var login = $('.value_login').val(),
        pass = $('.value_pass').val();
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"authuser", login: login, pass: pass},
        dataType: "html",
        success: function(res){
            var jsonp = JSON.parse(res);
            if(jsonp['seccess'] === undefined){
                if(jsonp['error'] == 'nopasslo'){echoerrorauth('Неправельный логин или пароль');}
                if(jsonp['error'] == 'obradmin'){echoerrorauth('Обратитесь к администратору, Ошибка авторизации 1');}
                $('.value_pass').val('');
            }else if(jsonp['error'] === undefined){
                location.reload() // window.location.reload()
            }else{echoerrorauth('Обратитесь к администратору, Ошибка авторизации 2');}
            loadingdata('off');
        },
        error: function(er){
            echoerrorauth('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
}
function exituser(){
    loadingdata('on');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"exit"},
        dataType: "html",
        success: function(res){
            var jsonp = JSON.parse(res);
            if(jsonp['seccess'] === undefined){
                location.reload('/');
            }else if(jsonp['error'] === undefined){
                location.reload('/'); // window.location.reload()
            }else{alert('Обратитесь к администратору, Ошибка авторизации 2');}
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
}
function send_otche_work_cod(){
    loadingdata('on');
    var data = prerborss($(".inputsvvodcodtable").serializeArray(),'0');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"cod_work_send",date: data},
        success: function(res){
            var jsonp = JSON.parse(res);
            if(jsonp['seccess'] === undefined){
                if(jsonp['error'] == 'est'){alert('Вы уже отправляли данный отчет');}
                if(jsonp['error'] == 'noSent'){alert('Время сдачи отчета уже прошло');}
            }else if(jsonp['error'] === undefined){
                window.location.href = '/work-cod';
            }else{alert('Обратитесь к администратору, Ошибка авторизации 2');}
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function downloadCodOtchet(id){
    loadingdata('on');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"download_cod_otchet", date: id},
        dataType: 'html',
        success: function(res){
            var link = document.createElement('a');
	        link.setAttribute('href', '/docs/cod_otchet_default.xls');
	        link.setAttribute('download', '/docs/cod_otchet_default.xls');
	        link.click();
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function download_result_otchet(){
    loadingdata('on');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"download_result_otchet"},
        dataType: 'html',
        success: function(res){
            var link = document.createElement('a');
	        link.setAttribute('href', '/docs/cod_otchet_default.xls');
	        link.setAttribute('download', '/docs/cod_otchet_default.xls');
	        link.click();
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function save_data_ochet_cod(id){
    loadingdata('on');
    var data = prerborss($(".inputsvvodcodtable").serializeArray(),'0');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"cod_work_save",id: id, date: data},
        success: function(res){
            var jsonp = JSON.parse(res);
            if(jsonp['seccess'] === undefined){
                if(jsonp['error'] == 'noaccess'){alert('У вас нет доступа');}
                if(jsonp['error'] == 'noSent'){alert('Время сдачи отчета уже прошло');}
            }else if(jsonp['error'] === undefined){
                window.location.href = '/list-otchets-work-cod';
            }else{alert('Обратитесь к администратору, Ошибка авторизации 2');}
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function filter_down(){
    loadingdata('on');
    var year_data = $(".yers_data").val(),math_data = $(".moth_data").val();
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"load_filter_data",year_data: year_data, math_data: math_data},
        success: function(res){
            $('.tbody_append').empty().append(res);
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function send_otche_forms1(){
    loadingdata('on');
    var data = prerborss($(".inputsvvodcodtable").serializeArray(),'0');
    if(indicators == true){
        $.ajax({
            url:"action/core.php",
            type:"POST",
            data:{operation:"send_otche_forms1",date: data},
            success: function(res){
                var jsonp = JSON.parse(res);
                if(jsonp['seccess'] === undefined){
                    if(jsonp['error'] == 'est'){alert('Вы уже отправляли данный отчет');}
                    if(jsonp['error'] == 'noaccess'){alert('У вас нет доступа');}
                    if(jsonp['error'] == 'noSent'){alert('Время сдачи отчета уже прошло');}
                    if(jsonp['error'] == 'noSent2'){alert('Неизвестная ошибка!');}
                }else if(jsonp['error'] === undefined){
                    window.location.href = '/key-indicators';
                }else{alert('Обратитесь к администратору, Ошибка авторизации 2');}
                loadingdata('off');
            },
            error: function(er){
                alert('Обратитесь к администратору, Ошибка авторизации 3');
                loadingdata('off');
            }
        })
    }else alert('У вас остались красные поля!');
    loadingdata('off');
}
function send_save_otche_forms1(){
    loadingdata('on');
    var data = prerborss($(".inputsvvodcodtable").serializeArray(),'0');
    if(indicators == true){
        $.ajax({
            url:"action/core.php",
            type:"POST",
            data:{operation:"send_save_otche_forms1",date: data},
            success: function(res){
                var jsonp = JSON.parse(res);
                if(jsonp['seccess'] === undefined){
                    if(jsonp['error'] == 'est'){alert('Вы уже отправляли данный отчет');}
                    if(jsonp['error'] == 'noaccess'){alert('У вас нет доступа');}
                    if(jsonp['error'] == 'noSent'){alert('Время сдачи отчета уже прошло');}
                    if(jsonp['error'] == 'noAccess'){alert('У вас отсутсвуют права на работу с этим отчетом!');}
                }else if(jsonp['error'] === undefined){
                    alert('Отчет успешно сохранен!');
                }else{alert('Обратитесь к администратору, Ошибка авторизации 2');}
                loadingdata('off');
            },
            error: function(er){
                alert('Обратитесь к администратору, Ошибка авторизации 3');
                loadingdata('off');
            }
        })
    }else alert('У вас остались красные поля!');
    loadingdata('off');
}
function download_key_indicators(id){
    loadingdata('on');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"download_key_indicators", date: id},
        dataType: 'html',
        success: function(res){
            var link = document.createElement('a');
	        link.setAttribute('href', '/docs/osnovnii_pokazatels_onebibl.xls');
	        link.setAttribute('download', '/docs/osnovnii_pokazatels_onebibl.xls');
	        link.click();
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function download_result_key_indicators(){
    loadingdata('on');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"download_result_key_indicators"},
        dataType: 'html',
        success: function(res){
            var link = document.createElement('a');
	        link.setAttribute('href', '/docs/osnovnii_pokazatels.xls');
	        link.setAttribute('download', '/docs/osnovnii_pokazatels.xls');
	        link.click();
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function send_otche_cultural_events(){
    loadingdata('on');
    var data = prerborss($(".inputsvvodcodtable").serializeArray(),'0');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"send_otche_cultural_events",date: data},
        success: function(res){
            var jsonp = JSON.parse(res);
            if(jsonp['seccess'] === undefined){
                if(jsonp['error'] == 'est'){alert('Вы уже отправляли данный отчет');}
                if(jsonp['error'] == 'noaccess'){alert('У вас нет доступа');}
                if(jsonp['error'] == 'noSent'){alert('Время сдачи отчета уже прошло');}
                if(jsonp['error'] == 'noSent2'){alert('Неизвестная ошибка!');}
            }else if(jsonp['error'] === undefined){
                window.location.href = '/cultural-events';
            }else{alert('Обратитесь к администратору, Ошибка авторизации 2');}
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function save_otchet_cultural_events(){
    loadingdata('on');
    var data = prerborss($(".inputsvvodcodtable").serializeArray(),'0');
        $.ajax({
            url:"action/core.php",
            type:"POST",
            data:{operation:"save_otchet_cultural_events",date: data},
            success: function(res){
                var jsonp = JSON.parse(res);
                if(jsonp['seccess'] === undefined){
                    if(jsonp['error'] == 'est'){alert('Вы уже отправляли данный отчет');}
                    if(jsonp['error'] == 'noaccess'){alert('У вас нет доступа');}
                    if(jsonp['error'] == 'noSent'){alert('Время сдачи отчета уже прошло');}
                    if(jsonp['error'] == 'noAccess'){alert('У вас отсутсвуют права на работу с этим отчетом!');}
                }else if(jsonp['error'] === undefined){
                    alert('Отчет успешно сохранен!');
                }else{alert('Обратитесь к администратору, Ошибка авторизации 2');}
                loadingdata('off');
            },
            error: function(er){
                alert('Обратитесь к администратору, Ошибка авторизации 3');
                loadingdata('off');
            }
        })
    loadingdata('off');
}
function download_cultural_events(id){
    loadingdata('on');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"download_cultural_events", date: id},
        dataType: 'html',
        success: function(res){
            var link = document.createElement('a');
	        link.setAttribute('href', '/docs/cultural_events_def.xls');
	        link.setAttribute('download', '/docs/cultural_events_def.xls');
	        link.click();
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function download_result_cultural_events(){
    loadingdata('on');
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"download_result_cultural_events"},
        dataType: 'html',
        success: function(res){
            var link = document.createElement('a');
	        link.setAttribute('href', '/docs/cultural_events_all_def.xls');
	        link.setAttribute('download', '/docs/cultural_events_all_def.xls');
	        link.click();
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
function send_answer_alert_message(){
    loadingdata('on');
    var message = $('.answer_alert_message').val();
    $.ajax({
        url:"action/core.php",
        type:"POST",
        data:{operation:"send_answer_alert_message",mes: message},
        success: function(res){
            var jsonp = JSON.parse(res);
            if(jsonp['seccess'] === undefined){
            }else if(jsonp['error'] === undefined){
                $('.alert_message_step_1').remove();
                $('.alert_message_step_2').show(900);
            }else{alert('Обратитесь к администратору, Ошибка авторизации 2');}
            loadingdata('off');
        },
        error: function(er){
            alert('Обратитесь к администратору, Ошибка авторизации 3');
            loadingdata('off');
        }
    })
    loadingdata('off');
}
$(document).ready(function(){
    $(".sidbar_link").on("click", function(){
        $('.sidebar_nav').find('a.sidbar_link').removeClass('active');
        $('.sidebar_nav').find('.sidbar_podmenu').removeClass('active').hide();
        $('.sidebar_nav').find('.link_sidbar_podmenu').removeClass('active');

        $(this).addClass('active');
        var sss = $(this).parent('.sidebar_item');
        $(sss).children('.sidbar_podmenu').addClass('active').show();
    });
    $(".link_sidbar_podmenu").on("click", function(){
        $('.sidebar_nav').find('a.link_sidbar_podmenu').removeClass('active');
        $(this).addClass('active');
    });
    $(".yers_data").on('change', function(e){
        filter_down();
    });
    $(".moth_data").on('change', function(e){
        filter_down();
    });
    
});
window.onload = function() {
    $(".preloader").hide();
 };