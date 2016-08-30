//***********************************
// General Variable For Global
// This can be edit
//***********************************
var _URL_ADMIN = '/abcd';

$(function(){



    //******************************
    // SHOW TOOLTIP OPTION FOR ITEM
    //******************************
    var $btchver = $('.bt_exp');
    $btchver.on('click', function(){
        var $aoddd = $(this).parent('.aoption').children('._exp_dropdown');
        if(!$aoddd.hasClass('_aoexp')){
            $(this).addClass('_aofocus');
            $('._exp_dropdown').removeClass('_aoexp');
            $aoddd.addClass('_aoexp');
        }else{
            $(this).removeClass('_aofocus');
            $aoddd.removeClass('_aoexp');
        }
    });

    //*******************************
    // AUTO HANDLE URL AND VALIDATE
    //*******************************
    var $_txtT = $('._txtT');
    var $_txtTr = $('._txtTr');
    var $_btnRef = $('.getAlias');
   
    $_txtTr.on({
        'focus': function(){
            $(this).removeClass('_overlay');
        },
        'focusout': function(){
            $(this).addClass('_overlay _edited');
            var self_j = change_alias($(this).val());
            $(this).val(self_j);
            ajaxCheckExists($(this), 'a_url_chk', $(this).val(), '_e_url', 'form-url', 'url đã trùng khớp. vui lòng kiểm tra lại');
    }});
    
    $_txtT.on('focusout', function(){
        var $vlStr = $_txtT.val();
        if($vlStr.length > 0){
            if(!$_txtTr.hasClass('_edited')){
                $vlStr = change_alias($vlStr);
                $_txtTr.val($vlStr);
            }
            $this = $(this);
            ajaxCheckExists($this, 'a_title_chk', $this.val(), '_e_title', 'form-title', 'tiêu đề tồn tại. vui lòng kiểm tra lại');
            $_txtT.css({'border-color':'#16a085'});
        }else{
            $_txtT.css({'border-color':'#e74c3c'});
        }
        $_btnRef.on('click', function(){
            $vlStr = change_alias($vlStr);
            $_txtTr.val($vlStr);
        });
    }); 

    //*****************************************
    //ID video youtube
    //*****************************************
    $('input[type=radio][name=a_type]').on('change', function(){
        if(this.value=='video'){
            if($(this).parents().find('.form-create').hasClass('form-update')){
                var idv = $(this).parents().find('.form-type').attr('id');
            }else{
                var idv ='';
            }
            var $frn ='<div class="form-group form-idv"><label for="">id video youtube (https://www.youtube.com/watch?v=<strong style="font-size: 0.7em;color:red">Zs-t1Iwou_s</strong> hoặc https://youtu.be/<strong style="font-size: 0.7em;color:red">GOOq_wCAaoQ</strong>)</label><div class="group-btn"><input type="text" name="a_idv" value="'+idv+'" class="form-control" id="a_idv_id" placeholder="id video youtube"></div></div>';
            $($frn).insertAfter('.form-type');
        }else{
            $(this).parents().find('.form-idv').remove();
        }
    });

    // ****************************************
    // TYPE MENU
    // ****************************************
    $('.form-menu input[type=radio][name=a_type]').on('change', function(){
         if(this.value=='none'){
            $_this = this;
            $(this).parents().find('.form-type-category').remove();
            $(this).parents().find('.form-type-link').remove();
            $(this).parents().find('.form-type-article').remove();
            if($(this).parents().find('.form-create').hasClass('form-update')){
                var idv = $(this).parents().find('.form-type').attr('id');
            }else{
                var idv ='';
            }
        }else if(this.value=='link'){
            $_this = this;
            $(this).parents().find('.form-type-category').remove();
            $(this).parents().find('.form-type-article').remove();
            if($(this).parents().find('.form-create').hasClass('form-update')){
                var idv = $(this).parents().find('.form-type').attr('id');
            }else{
                var idv ='';
            }
            var _get_Data = '';
            if($('.form-create').hasClass('form-update')){
                _get_Data = $_this.id;
            }
            var $frn ='<div class="form-group form-type-link"><label for="">đường dẫn tùy chỉnh</label><div class="group-btn"><input type="text" name="a_link" class="form-control" id="a_link_id" value="'+_get_Data+'" placeholder="nhập đường dẫn vào đây..."></div></div>';
            $($frn).insertAfter('.form-type');
        
        }else if(this.value=='category'){
            $_this = this;
            $(this).parents().find('.form-type-link').remove();
            $(this).parents().find('.form-type-article').remove();
            
            $.ajax({
                type: 'GET',
                url: _URL_ADMIN+'/menu/getdata_object',
                data: 'type=category',
                beforeSend: function(){
                    $('<div class="_temp_loading">đang tải chủ đề...</div>').insertAfter('.form-type');
                },
                success: function(data){
                    //remove loading after success
                    $('._temp_loading').remove();
                    //print selectd if form is update
                    var _get_ID = 0; // get ID category
                    var _slt ='';//assign selected
                    if($('.form-create').hasClass('form-update')){
                        _get_ID = $_this.id.substr(16, 30);
                    }
                    //
                    var $frn = '';
                    $frn += '<div class="form-group form-inline form-type-category"><label for="">chủ đề</label><div class="pad"><select name="a_category" id="a_category_id" class="form-control ">';
                    for (var i = 0; i < data.length; i++) {
                        if(_get_ID==data[i].id){_slt="selected";}//check if id_update = id_data
                        $frn += '<option '+_slt+' value="'+data[i].id+'">'+data[i].title+'</option>';
                    }
                    $frn += '</select></div></div>';
                    $($frn).insertAfter('.form-type');

                },
                error:function(){
                    console.log('fail');
                }
            });
        }else{
            $_this = this;
            $(this).parents().find('.form-type-link').remove();
            $(this).parents().find('.form-type-category').remove();
            var $frn ='<div class="form-type-article">bài viết</div>';
             $.ajax({
                type: 'GET',
                url: _URL_ADMIN+'/menu/getdata_object',
                data: 'type=article',
                beforeSend: function(){
                    $('<div class="_temp_loading">đang tải bài viết...</div>').insertAfter('.form-type');
                },
                success: function(data){
                    $('._temp_loading').remove();
                    var _get_ID = 0; // get ID article
                    var _slt ='';//assign selected
                    if($('.form-create').hasClass('form-update')){
                        _get_ID = $_this.id.substr(15, 30);
                    }
                    var $frn = '';
                    $frn += '<div class="form-group form-inline form-type-article"><label for="">bài viết</label><div class="pad"><select name="a_article" id="a_article_id" class="form-control ">';
                    for (var i = 0; i < data.length; i++) {
                        if(_get_ID==data[i].id){_slt="selected";}//check if id_update = id_data
                        $frn += '<option '+_slt+' value="'+data[i].id+'">'+data[i].title+'</option>';
                    }
                    $frn += '</select></div></div>';
                    $($frn).insertAfter('.form-type');
                },
                error:function(){
                    console.log('fail');
                }
            });
        }
    });

    // ***************************************
    // DELETE MENU AJAX
    // ***************************************

    var $mn = $('.menu-list li .m_opt');
    $mn.on('click', function(event){
        var $_this = $(this);

        var mstr = "";
        var mtype = 0;
        var mclass = '_hide';
        var micon = 'fa-eye';

        if($_this.hasClass('m_hide')){
            mstr = 'ẩn';
            mtype = 0;
            mclass = '_hide';
            micon_a = 'fa-eye m_show';
            micon_o = 'fa-eye-slash m_hide';
        }else if($(this).hasClass('m_show')){
            mstr = 'hiện';
            mtype = 1;
            mclass = '_show';
            micon_a = 'fa-eye-slash m_hide';
            micon_o = 'fa-eye m_show';

        }else{
            mstr = 'xóa';
            mtype = 2;
            mclass = '';
            micon_a = '';
            micon_o = '';
        }
        if($_this.parents('.m_root').length > 0){
            var mncf = confirm('menu này chứa nhiều menu con khác. bạn thật sự muốn '+mstr+' menu này không?');
        }else{
            var mncf = confirm('bạn có muốn '+mstr+' menu này không?');
        }
        if(mncf==true){
            $('body').prepend('<div class="__ntFx"></div>');
            var mn_id = $(this).attr('id').substr(3,7);
            $.ajax({
                type :'GET',
                url : _URL_ADMIN+'/menu/hide',
                data: {'_id': mn_id, '_mtype': mtype},
                beforeSend: function () {
                    $('.__ntFx').html('đang xử lý liệu...').addClass('__ss');
                },
                success: function(data){
                    if(data == 'ok' ){
                        //add class to css this item menu
                        $('.mn_'+mn_id).addClass(mclass);

                        //show message and hide it after 1s
                        $('.__ntFx').html(mstr+' menu thành công').addClass('__ss');
                        setTimeout(function(){
                            $('.__ntFx.__ss').fadeOut(1000).remove();
                        },1000);

                        if(mtype == 2){
                            $('.mn_'+mn_id).fadeOut('slow').remove();
                        }

                        //check list and display if list is empty after remove 
                        if($('.menu-list li').length == 0 ){
                            $('.menu-list').html('chưa có menu nào được tạo');
                        }

                        //alternative icon option
                        $_this.removeClass(micon_o).addClass(micon_a);

                    }else{
                        $('.__ntFx').html('Xử lý lỗi. '+mstr+' menu không thành công').addClass('__ss');
                        setTimeout(function(){
                            $('.__ntFx.__ss').fadeOut(1000).remove();
                        },1000);
                    } 
                },
                error: function(){
                    $('.__ntFx').html('Lỗi. '+mstr+' menu không thành công').addClass('__ss');
                    setTimeout(function(){
                        $('.__ntFx.__ss').fadeOut(1000).remove();
                    },1000);
                }
            });
        }
        
    });

    //*****************************************
    // VALIDATE FORM CREATE ARTICLE
    //*****************************************
    
    var errfile = true;
    $('#a_thumbnail_id').bind('change', function() {
          var fsize = this.files[0].size/1024;
          if(fsize > 2048){
            errfile = false;
          }else{
            errfile = true;
          }
        return errfile;

        });
    var $btnAtc = $('.add-article, .add-category, .add-menu');
    $btnAtc.on('click', function(event){
        if($('.form-create').hasClass('form-article')){
            var atitle = a_form_create.a_title.value;
            var aurl = a_form_create.a_url.value;
            var acate = a_form_create.a_cate.value;
            var atype = a_form_create.a_type.value;
            var adesc = a_form_create.a_desc.value;
            var acontent = CKEDITOR.instances.a_content_id.getData();//$('textarea#a_content_id').val();
            var athumb = a_form_create.a_thumbnail.value;
            var atag = a_form_create.a_tag.value;//a_form_create.a_tag.value;
            var astatus = a_form_create.a_status.value;

            if( atitle.length==0||aurl.length==0||adesc.length==0||acontent.length==0|| (athumb.length==0 && !$('.form-create').hasClass('form-update')) ||atag.length==0){
                alert('vui lòng không để trống mục nào');
                return false
            }
            if(atitle.length < 10 || atitle.length > 100){
                alert('tiêu đề quá ngắn hoặc quá dài (tối thiểu 10 và tối đa 100 ký tự)');
                return false;
            }else if($('#a_title_id').hasClass('_error')){
                alert('có lỗi ở tiêu đề. vui lòng kiểm tra lại');
                return false;
            }

            if(aurl.length < 5 || aurl.length > 200){
                alert('url quá ngắn hoặc quá dài (tối thiểu 5 và tối đa 150 ký tự)');
                return false;
            }
            if(adesc.length < 10 || adesc.length > 1000){
                alert('mô tả quá ngắn hoặc quá dài (tối thiểu 5 và tối đa 300 ký tự)');
                return false;
            }
            if(acontent.length < 30){
                alert('nội dung quá ngắn (tối thiểu 30 ký tự)');
                return false;
            }
            // check size of image
            if(errfile == false){
                alert('ảnh quá lớn (tối đa 2Mb). vui lòng kiểm tra lại');
                return false;
            }
            //check extension of image
            if(fileValidate(athumb)==false){
                alert('tệp '+athumb+' cần định dạng JEPG/JPG/PNG/BMP/GIF. vui lòng kiểm tra lại');
                return false;
            }
        }else if($('.form-create').hasClass('form-menu')){
            var atitle = a_form_create.a_title.value;
            var aurl = a_form_create.a_url.value;
            //check if have input link field
            if($(this).parents('.form-create').find('.form-type-link').length>0){
                var alink = a_form_create.a_link.value;
                //validate before submit form
                if( alink.length==0 || alink.length>200){
                    alert('vui lòng không để trống mục nào');
                    return false
                }else if( alink.length <10 || alink.length>200){
                    alert('đường dẫn đến menu quá ngắn hoặc quá dài. tối thiểu 10 và tối đa 200 kí tự');
                    return false
                }
            }
            if( atitle.length==0||aurl.length==0){
                alert('vui lòng không để trống mục nào');
                return false
            }
            if(atitle.length < 5 || atitle.length > 100){
                alert('tên menu quá ngắn hoặc quá dài (tối thiểu 10 và tối đa 100 ký tự)');
                return false;
            }else if($('#a_title_id').hasClass('_error')){
                alert('có lỗi ở tên menu. vui lòng kiểm tra lại');
                return false;
            }

            if(aurl.length < 5 || aurl.length > 200){
                alert('url quá ngắn hoặc quá dài (tối thiểu 5 và tối đa 150 ký tự)');
                return false;
            }else if($('#a_url_id').hasClass('_error')){
                alert('có lỗi ở url. vui lòng kiểm tra lại');
                return false;
            }
            
            
        }else{
            var atitle = a_form_create.a_title.value;
            var aurl = a_form_create.a_url.value;
            var adesc = a_form_create.a_desc.value;
            var athumb = a_form_create.a_thumbnail.value;
            var astatus = a_form_create.a_status.value;

            if( atitle.length==0||aurl.length==0||adesc.length==0 || (athumb.length==0 && !$('.form-create').hasClass('form-update'))){
                alert('vui lòng không để trống mục nào');
                return false
            }
            if(atitle.length < 10 || atitle.length > 100){
                alert('tiêu đề quá ngắn hoặc quá dài (tối thiểu 10 và tối đa 100 ký tự)');
                return false;
            }else if($('#a_title_id').hasClass('_error')){
                alert('có lỗi ở tiêu đề. vui lòng kiểm tra lại');
                return false;
            }

            if(aurl.length < 5 || aurl.length > 200){
                alert('url quá ngắn hoặc quá dài (tối thiểu 5 và tối đa 150 ký tự)');
                return false;
            }
            if(adesc.length < 10 || adesc.length > 1000){
                alert('mô tả quá ngắn hoặc quá dài (tối thiểu 5 và tối đa 300 ký tự)');
                return false;
            }
            
            // check size of image
            if(errfile == false){
                alert('ảnh quá lớn (tối đa 2Mb). vui lòng kiểm tra lại');
                return false;
            }
            //check extension of image
            if(fileValidate(athumb)==false){
                alert('tệp '+athumb+' cần định dạng JEPG/JPG/PNG/BMP/GIF. vui lòng kiểm tra lại');
                return false;
            }
        }

        

        return true;
    });

    //***********************
    // TAG HANDLE
    //***********************

    var $add_tag = $('.add-tag');
    var $a_w_tag = $('.add-wrap-tag');
    var $in_tag = $('.e-tag');
    var id = 1;
    $add_tag.on('click', function(){
        $in_tag.focus();
    });



    $in_tag.on('keyup', function(e){
        var tagfield = $(this).next('#a_tag_id').val();
        var regCode = /[^a-zA-Z0-9\s|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ|đ]+/g;
        if(e.keyCode == 188 && $(this).val().replace( regCode, '').length > 1){
            // alert();
            tag = $in_tag.val().replace(regCode, '').trim();
            $a_w_tag.append('<span id="n_tg_'+id+'" class="n-tg">'+tag+'<i class="_t_close fa fa-times"></i></span>');
            $in_tag.val('').focus();
            var $remove_tag = $('._t_close');

            tagfield = tagfield+tag+','; //gán tag để nhập vào input hidden
            
            $('#a_tag_id').val(tagfield); // set giá trị tag hidden
            tagfield = $(this).next('#a_tag_id').val();
            $remove_tag.on('click', function(e){
                var $rmt_t = $(this).parent('.n-tg');
                var rmt_tt = $(this).parent('.n-tg').text(); //lấy tag cần replace
                $('#'+$rmt_t.attr('id')).remove(); //remove tag html
                tagfield = tagfield.replace(rmt_tt.trim()+',', ''); //replace trong input hidden
                $('#a_tag_id').val(tagfield); // set lại tag cho input hidden
                
            });
            // if($('.form-create').hasClass('form-update')){
            //     $('.form-create').removeClass('form-update');
            // }
            id++;
        }
    });
    if($('.form-create').hasClass('form-update')){
         $('._t_close').on('click', function(e){
                var $rmt_t = $(this).parent('.n-tg');
                var rmt_tt = $(this).parent('.n-tg').text(); //lấy tag cần replace

                var taglist = $(this).parents('.add-tag').find('#a_tag_id').val();//lấy tag list hiện tại để replace
                $('#'+$rmt_t.attr('id')).remove(); //remove tag html
                var tagfield = taglist;
                tagfield = tagfield.replace(rmt_tt.trim()+',', ''); //replace trong input hidden
                // alert(rmt_tt);
                console.log('taglist '+taglist);
                // 
                $('#a_tag_id').val(tagfield); // set lại tag cho input hidden
                
            });

         $('#a_thumbnail_id').bind('change', function(event){
            if($('#a_thumbnail_id').length > 0){
                $('input[name=a_h_thumbnail]').remove();
            }else{

            }
         });
     }
    //*********************************************
    // SIDE BAR HANDLE
    //*********************************************
    var $side = $('.sidebar');
    $('.col-expand').prepend('<span class="collapse-sidebar" title="collapse sidebar"><i class="fa fa-chevron-right"></i></span>');
    var $btncollapse = $('.collapse-sidebar');
    $btncollapse.on('click', function(){
        if(!$(this).hasClass('_collapsed')){
            var $fExpand = $(this).parents('#create_aricle').find('.col-expand');
            var $fCollapse = $(this).parents('#create_aricle').find('.col-collapse');
            $(this).html('<i class="fa fa-chevron-left"></i>');
            $fExpand.attr('class', 'col-expand col-xs-12 col-sm-12 col-md-12 col-lg-12');
            $fCollapse.attr('class', 'col-collapse sidebar col-xs-0 col-sm-0 col-md-0 col-lg-0');
            $fCollapse.css({'display':'none'});
            $(this).addClass('_collapsed');
        }else{
            $(this).removeClass('_collapsed');
            var $fExpand = $(this).parents('#create_aricle').find('.col-expand');
            var $fCollapse = $(this).parents('#create_aricle').find('.col-collapse');
            $(this).html('<i class="fa fa-chevron-right"></i>');
            $fExpand.attr('class', 'col-expand col-xs-12 col-sm-12 col-md-9 col-lg-9');
            $fCollapse.attr('class', 'col-collapse sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3');
            $fCollapse.css({'display':'block'});
        }
        
    });

    // *************************************************************
    // EFFECT ORTHER
    // *************************************************************
    setTimeout(function() { 
           $('.i_tool').fadeOut(1000); 
       }, 2000);



    // *************************************************************
    // HANDLE DELETE POST
    // *************************************************************
    $btn_del = $('.a_del');
    $btn_del.on('click', function(event){
        var _id = $(this).attr('data-id').substr(6,20);
        var _type = $(this).parents('.aitem').attr('type'); 
        var $_strId = $('.aitem_'+_id);
        var _url = '';
        var _ntype='';
        if(_type=='category'){
            _ntype = 'chủ đề';
            _url = _URL_ADMIN+'/category/destroy';
        }else{
            _ntype = 'bài viết';
            _url = _URL_ADMIN+'/article/destroy';
        }
        $(this).parents('._exp_dropdown').removeClass('_aoexp');

        var _cfd = confirm('bạn muốn xóa '+_ntype+' này?');
        if(_cfd==true){
            $('body').prepend('<div class="__ntFx"></div>');
            $.ajax({
                type: 'GET',
                url: _url,
                data: {'_id': _id},
                beforeSend: function () {
                    $('.__ntFx').html('đang xử lý liệu...').addClass('__ss');
                },
                success: function(data){
                    console.log(data);
                    $('.__ntFx').html('xóa thành công').addClass('__ss');
                    $_strId.fadeOut(1000).remove();
                    setTimeout(function(){
                        $('.__ntFx.__ss').fadeOut(1000);
                    },1000);
                },
                error:function(){
                    console.log('fail');
                }
            })
        }else{
             return false;
        }
        event.preventDefault();

    });
});

function change_alias( alias )
{
    var str = alias;
    str= str.toLowerCase(); 
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ |ặ|ẳ|ẵ/g,"a"); 
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
    str= str.replace(/đ/g,"d"); 
    str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
    /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    str= str.replace(/^\-+|\-+$/g,""); 
    //cắt bỏ ký tự - ở đầu và cuối chuỗi 
    return str;
}

function ajaxCheckExists(inputCheck, varCheck, valueCheck, compareData, classForm, msgError){
    var jsonData = {};
    jsonData[varCheck] = valueCheck;
    jsonData['_token'] = $('input[name=_token]').val();
    if($('.form-create').hasClass('form-update')){
        jsonData['fn'] = 'update';
        jsonData['id'] = $('input[name=_post_id]').val();
    }else{
        jsonData['fn'] = 'create';
    }
    $.ajax({
            type: 'POST',
            url: _URL_ADMIN+'/article/checkexists',
            data: jsonData,
            success: function(data){
                console.log(data);
                if(data === compareData){
                    if(!inputCheck.hasClass('_error')){
                        inputCheck.addClass('_error');
                        inputCheck.parents('.'+classForm).append('<p style="margin: 5px;color: #ff0000;font-size: 0.7em;">'+msgError+'</p>'); 
                    }
                }else{
                    inputCheck.removeClass('_error');
                    inputCheck.parents('.'+classForm).find('p').remove();
                }
                
            },
            error: function(){
                console.log('fail');
            }
        });
}

var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function fileValidate(fileName) {
    var arrInputs = fileName;
        if (fileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (fileName.substr(fileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
            
            if (!blnValid) {
                return false;
            }
        }
    return true;
}