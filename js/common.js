$(document).ready(function(){

    // if (jQuery().select2){
    //     $('select').select2('destroy');
    //     $('select2').select2();
    // }
    if (jQuery().TouchSpin) {
        var max=$('.jump_to_val').attr('max');
        $(".product-quantity .form-control").TouchSpin({
            min: 1,
            max: max,
            buttondown_class: "btn quantity-down",
            buttonup_class: "btn quantity-up"
        });
        $(".quantity-down").html("<i class='fa fa-angle-down'></i>");
        $(".quantity-up").html("<i class='fa fa-angle-up'></i>");
    }
    $(document).on("click",".jump_to",function(){
        var id=$('.jump_to_val').val();
        var url= $(this).data('url');
        var url= url+'/'+id+'';
        document.location.href = completeURL(url);

        /*$.ajax({
            type:'POST',
            url:completeURL('jump_to'), 
            dataType:'html',
            data:{id:id,type:type,tbl:tbl},
            success:function(data)
            {                   
                $('.dump').html($(data).find('.dump').html());
            }
        });*/
    });

    if (jQuery().datepicker) {
        $('.date-picker').datepicker({
            orientation: "right",
            autoclose: true,
            format: 'dd-mm-yyyy'
        });
    }

    $(document).on("click",".sectionb",function(){
        $(".section1").css("display", "none");
        $(".section2").css("display", "block");
    });
    
    $(document).on("click",".sectiona",function(){
        $(".section1").css("display", "block");
        $(".section2").css("display", "none");
    });

    $(document).on('click','.chk_login',function(e){
        e.preventDefault();
        var this1 = $(this);
        $('.alert-success').show(); 
        var form = '#'+$(this).closest('form').attr('id');
        $('.chk_login').prop('disabled',true);
        var url = $(form).attr('action');
        var serialize_data = $(form).serialize();
        $.ajax({
            type:'POST',
            url:completeURL(url), 
            dataType:'json',
            data:serialize_data,
            success:function(data)
            {   
                if (data.valid)
                {
                    document.location.href = data.redirect;
                }
                else
                {
                    this1.closest('form').find('.alert-success').hide();
                    this1.closest('form').find('.alert-danger').html(data.msg).show();  
                    this1.closest('form').find('.alert-danger').fadeOut(3500);   
                    this1.closest('form').find('.password').val('');              
                }                                      
                $('.chk_login').prop('disabled',false);
            }
        });
    });

    $(document).on('click','.common_save',function(e){
        var form = '#'+$(this).parents('form').attr('id');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        var id = $(this).attr('rel');

        $(form).validate({ 
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ":hidden",  // validate all fields including form hidden input
            rules: {
                lesson_name: { required:true },
                lesson_desc: { required:true },
                "course_id[]": { required:true },

                section_id: { required:true },
                question_mar: { required:true },
                question_hindi: { required:true },
                question: { required:true },
                ans_option: { required:true },  

                course_id: { required:true },
                to: { required:true },
                cc: { required:true },
                bcc: { required:true },
                subject: { required:true },
                message: { required:true },
                attachment_file: { required:true },
                attachment_file1: { required:true },
                passage: { required:true },
                desc: { required:true }

            }, 

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success.hide();
                error.show();
                $('html,body').animate({scrollTop:0});
            },
 
            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                //alert($(element).attr('name'));
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function (element) { // revert the change done by hightlight
                
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form) {
                $('.common_save').prop('disabled',true);
                var url = $(form).attr('action');
                var serialize_data = $(form).serialize();
                serialize_data = {id:id};

                $(form).ajaxSubmit({
                    type:'POST',
                    url:completeURL(url), 
                    dataType:'json',
                    data:serialize_data,
                    success:function(data)
                    {   
                        if(data.valid)
                        {
                            bootbox.alert(data.msg, function() {
                                setTimeout(function(){
                                    document.location.href=document.location.href;                                
                                },1500);
                            });
                        }
                        else
                        {
                            bootbox.alert(data.msg, function() {
                                $('.common_save').removeAttr('disabled'); 
                            });
                        }
                        
                    }
                });
            }
        });
    });

    $(document).on('click','.editRecord', function(){
        var id = $(this).attr('rel');
        var url = $(this).attr('rev');

        $.ajax({
            url : completeURL(url),
            type : 'POST',
            dataType : 'html',
            data:{id:id},
            success:function(data)
            {          
                $('html, body').animate({scrollTop:0});
                $('.form').html($(data).find('.form').html());
            },
            complete:function(){
                if (jQuery().select2) {
                    $('.select2').select2();
                }
            }
        }); 
    });

    $(document).on('click','.deleteRecord' , function(){
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) {
            if(result)
            {
                var id = deleteDiv.attr('rel');
                var url = deleteDiv.attr('rev');
                
                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data:{id:id},
                    success:function(data)
                    {
                        bootbox.alert(data.msg, function() {
                            setTimeout(function(){
                                document.location.href=document.location.href;                                
                            },1500);
                        });
                    }
                });
            }
        }); 
    });

    $(document).on("change",".course_change",function(){
        var course_id = $(this).select2('val');
        if(course_id > 3)
        {
            $(".showdiv").show();
        }
        else
        {
            $(".showdiv").hide();
        }
    });

    $(document).on('change','.duplicate',function(){
        var p_key = $(this).data('p_key');
        var id = $(this).attr('rel');
        var tbl = $(this).data('tbl');
        var where = $(this).data('where');
        var value = $(this).val();
        var this1 = $(this);
        $(this).closest('div').find('.help-block').remove();
        $.ajax({
            type:'POST',
            url:completeURL('duplicate'),
            data:{id:id,p_key:p_key,tbl:tbl,where:where,value:value},
            dataType:'json',
            success:function(data)
            {    
                if(data.valid)
                {
                    this1.closest('div').append('<span class="help-block">'+data.msg+'</span>');
                    this1.val("");                    
                    this1.select2('val','');                    
                    this1.closest('.form-group').addClass('has-error');
                    this1.closest('div').find('i').addClass('fa-warning').removeClass('fa-check');                    
                }
                else
                {
                    this1 .closest('.form-group').removeClass('has-error').addClass('has-success');
                    this1.closest('div').find('i').addClass('fa-check').removeClass('fa-warning');
                }

                
            }
        });
    });

    $(document).on('click','.add_row',function()
    {
        var clonedRow = $(this).parents('tbody.row_group').find('tr:first').clone();
        clonedRow.find('input').val('');
        clonedRow.find('input[type=radio]').prop('checked', false).unwrap().uniform();
        clonedRow.find('.tooltip').css('display','none');  
        clonedRow.find('div.btn_group').append('<span class="tooltips delete_row" data-placement="top" data-original-title="Remove" style="cursor: pointer;">'+                                                  
                                                        '<i class="fa fa-trash-o"></i>'+                                                    
                                                    '</span>');
        clonedRow.find('.tooltips').tooltip({placement: 'top'});
        $(this).parents('tbody.row_group').append(clonedRow);       
        var k=0; 
        $("tbody.row_group  tr").each(function() {
            k++;
            $(this).find('input[type=radio]').val(k);
        }); 
    });

    $(document).on('click','.delete_row', function(){      
        $(this).closest('tr').remove();    
        var k=0; 
        $("tbody.row_group  tr").each(function() {
            k++;
            $(this).find('input[type=radio]').val(k);
        });  
    });
    
    $("#editor").on("keydown keyup", function(e) {
        if (e.keyCode === 32 && e.shiftKey==false) 
        {
            var ques = $(".que").text().replace(/[\s]+/g, " ").trim();
            var ques_word = ques.split(" ");
            var newHTML = "";
            var result = $(this).text().replace(/[\s]+/g, " ").trim();
            var result_word = result.split(" ");
            $.each(result_word, function(index, value){ 
                if(result_word[index]!=ques_word[index])
                {
                    newHTML += "<span class='false'>" + value + "&nbsp;</span>";
                }
                else
                {
                    newHTML += "<span class='true'>" + value + "&nbsp;</span>";
                }
            });  
            $(this).html(newHTML);
        
            var child = $(this).children();
            var range = document.createRange();
            var sel = window.getSelection();
            range.setStart(child[child.length - 1], 1);
            range.collapse(true);
            sel.removeAllRanges();
            sel.addRange(range);
            $(this)[0].focus();              
        }            
    });

    $(document).on('click','.popup_save',function(){
        var id = $(this).attr('rel');
        var url = $(this).attr('rev');
        var title= $(this).data('title');
        var data={id:id};

        $.ajax({
            url:completeURL(url), 
            data:data,          
            type:'POST',  
            dataType:'json',

            success: function(data)
            {   
                var dialog = bootbox.dialog({
                    message: data.view,
                    title: title, 
                    buttons: { 
                        danger: {
                            label: "Cancel",
                            className: "btn-danger",
                            callback: function() { }
                        }, 
                        success: {
                            label: "Submit",
                            className: "btn-success",
                            callback: function() {
                                var form= '#popup_save';
                                var url = $(form).attr('action');
                                // alert(url);
                                var serialize_data = $(form).serialize();
                                serialize_data = {serialize_data:serialize_data,id:id};
                                //alert(serialize_data);                                    

                                var form2 = $(form);
                                var error2 = $('.alert-danger', form2);
                                var success2 = $('.alert-success', form2);

                                var validate = $(form).validate({
                                    errorElement: 'span', //default input error message container
                                    errorClass: 'help-block', // default input error message class
                                    focusInvalid: false, // do not focus the last invalid input
                                    ignore: ":hidden",  // validate all fields including form hidden input,
                                    debug: true,
                                    rules: {
                                        current_pass: {required: true },
                                        new_pass: {required: true },
                                        confirm_pass: {required: true, equalTo: "#user_pass"},
                                        
                                        "course_id[]": { required:true },
                                        stud_name: {required:true,letterswithbasicpunc:true},   
                                        stud_last_name: {required:true},  
                                        stud_contact: {required:true,number:true},    
                                        stud_mail: {required:true,email:true},
                                        

                                        "student_name[]": {required:true},
                                        notification: {required:true},   
                                        from_date: {required:true},   
                                        to_date: {required:true},   

                                        notification_desc: {required:true}, 

                                        gr_no: {required:true},
                                        batch_time: {required:true},
                                        machin_no: {required:true},
                                        instalment: {required: true },
                                        fee: {required: true,number:true},
                                        course_id: {required: true },
                                        other_fee: {required: true,number:true},
                                        description: {required: true }

                                    },

                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                        success2.hide();
                                        error2.show();
                                       $('html, body').animate({scrollTop:0});
                                    },

                                    errorPlacement: function (error, element) { // render error placement for each input type
                                        var icon = $(element).parent('.input-icon').children('i');
                                        icon.removeClass('fa-check').addClass("fa-warning");  
                                        icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                                    }, 

                                    highlight: function (element) { // hightlight error inputs
                                        $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                                    },

                                    unhighlight: function (element) { // revert the change done by hightlight
                                        $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                                    },

                                    success: function (label, element) {
                                        var icon = $(element).parent('.input-icon').children('i');
                                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                                        icon.removeClass("fa-warning").addClass("fa-check");
                                    },

                                    submitHandler: function (form) {
                                        
                                    }
                                }).form();
                                var $valid = $(form).valid();
                                if(!$valid) 
                                {                                                               
                                    return false;
                                }
                                else
                                { 
                                    $(form).ajaxSubmit({
                                        type:'POST',
                                        url:completeURL(url), 
                                        dataType:'json',
                                        data: serialize_data,
                                        success:function(data)
                                        {  
                                            if(data.redirect)
                                            {
                                                bootbox.alert(data.msg, function() {
                                                    setTimeout(function(){
                                                        document.location.href=data.redirect;                                
                                                    },1500);
                                                });
                                            }
                                            else
                                            {
                                                bootbox.alert(data.msg, function() {
                                                    setTimeout(function(){
                                                        document.location.href=document.location.href;                                
                                                    },1500);
                                                });  
                                            }                                      
                                        }
                                    });
                                }                                         
                            }
                        }
                    }
                });
            },
            complete:function()
            {   
                Metronic.init();     
                if (jQuery().select2) {
                    ComponentsBootstrapMultiselect.init(); 
                    $('select').select2('destroy');
                    $('.select2').not('.multiselect').select2();
                }              
                if (jQuery().datepicker) {
                    $('.date-picker').datepicker({
                        orientation: "right",
                        autoclose: true,
                        format: 'dd-mm-yyyy'
                    });
                } 
                
                //$('.modal-dialog').css({'max-width': 'none', 'width': '45%'});
            }
        }); 
    });

    $(document).on("click",".mob_next_prev",function(){
        $(".mob_div").addClass('hide');
        var no=$(this).attr("rel");
        $(".mob_"+no).removeClass('hide');
        $(".mob_next_prev").removeClass('orange');
        $(".btn_"+no).addClass('orange');
    });

    $(document).on('mousedown','.show_pass', function(){
        $(this).parents('.form-group').find('.password').attr("type","text");
    });

    $(document).on('mouseup','.show_pass', function(){
        $(this).parents('.form-group').find('.password').attr("type","password");
    });

    $(document).on('switchChange.bootstrapSwitch','.latter_type',function()
    {
        if($(this).is(":checked")) {
            var url= completeURL('letter_practice')+'/yes/business';
            $('.type_yes').attr('href',url);
            var url= completeURL('letter_practice')+'/no/business';
            $('.type_no').attr('href',url);
        }
        else
        {
            var url= completeURL('letter_practice')+'/yes/personal';
            $('.type_yes').attr('href',url);
            var url= completeURL('letter_practice')+'/no/personal';
            $('.type_no').attr('href',url);
        }
    }); 

    $(document).on('change','.lang_set',function(){
        var lang = $(this).val();        
        $.ajax({
            type:'POST',
            url:completeURL('lang_change'),
            data: {lang:lang},
            dataType:'json', 
            success:function(data)
            {            
                
            }
        }); 
    });

    $(document).on('click','.set_time_popup',function()
    {
        var id = $(this).attr('rel');
        var url = $(this).attr('rev');
        var title= $(this).data('title');
        var data={id:id};
        $.ajax({
            type:'POST',  
            url:completeURL(url),
            data:data,  
            dataType:'json', 
            success: function(data)
            {   
                $('html, body').animate({scrollTop:0});
                var dialog = bootbox.dialog({
                    message: data.view,
                });
                Metronic.init();
                Layout.init();
            }
        }); 
    });

    $(document).on("change",".lang_change",function(){
        var lang = $(this).val();
        $(this).parents('.portlet').find('.que_div').css('display','none');
        if(lang =='Marathi')
        {
            $(this).parents('.portlet').find('.que_marathi').css('display','block');
        }
        else if(lang =='Hindi')
        {
            $(this).parents('.portlet').find('.que_hindi').css('display','block');   
        }
        else 
        {
            $(this).parents('.portlet').find('.que_english').css('display','block');   
        }
    });

    $(document).on("click",".que_next_prev",function(){
        $(".question").addClass('hide');
        var no=$(this).attr("rel");
        $(".question_"+no).removeClass('hide');
        $(".que_next_prev").removeClass('btn-danger');
        $(".btn_"+no).addClass('btn-danger');
    });

    $(document).on("click",".que_option",function(){
        if($(this).is(':checked'))
        {
            $(".que_next_prev").removeClass('btn-danger');
            $("."+$(this).attr("rel")).css("color", "btn-success");
            //$("."+$(this).attr("rel")).css("background", "btn-danger");
        }else
        {
            $("."+$(this).attr("rel")).removeClass('btn-success');
        }
    });

    $(document).on("click",".que_next_prev",function(){
        $(".question").addClass('hide');
        var no=$(this).attr("rel");
        $(".question_"+no).removeClass('hide');
        $(".que_next_prev").removeClass('btn-danger');
        $(".btn_"+no).addClass('btn-danger');
    });

    $(document).on("click",".que_option",function(){
        if($(this).is(':checked'))
        {
            $(this).parents('.radio-list').find('i').css('display','none');
            $(this).parents('.radio-list').find('.right').css('display','inline');
            $(this).parents('label').find('i').css('display','inline');
            $(".que_next_prev").removeClass('btn-danger');
            $("."+$(this).attr("rel")).addClass('btn-success');
        }else
        {
            $("."+$(this).attr("rel")).removeClass('btn-success');
        }
    });

    $(document).on('change','.obj_reload',function(){
        var id = $('#section_id').find('option:selected').val();
        var que_cnt = $('#que_cnt').val() || 25;
        var time = $('#time').val();
        var url = 'objective_practice/'+time+'/'+id+'/'+que_cnt;
        window.location.href = completeURL(url);
    });

    $(document).on('click','.btn_submit_test', function(){
        $('html, body').animate({scrollTop:0});
        var btn=$(this);
        btn.prop('disabled',true);
        bootbox.confirm("Are you sure you want to finish ?", function(result) 
        {
            if (result) {
               submit_test();  
            } else {
                btn.removeAttr('disabled');
            }
        });
    });


    var file_value='';
    $(document).on('click', '.attachment h5', function () {
        $('.attachment').find('h5').css({"background":"#fff","color":"#6A6D72"});
        $(this).css({"background":"#ddd","color":"#000"});
        file_value = $(this).html();
    });

    $(document).on('click','.attachment_btn',function(){
        var url='select_attachment';
        var this1=$(this);      
        $.ajax({
            url:completeURL(url),          
            type:'POST',
            dataType:'json',
            success: function(data)
            {
                var dialog = bootbox.dialog({
                    message: data.view,
                    buttons: 
                    {
                        Attach: {
                            label: "Attach",
                            className: "btn btn-success select_attachment",
                            callback: function() 
                            {
                               this1.closest('.input-group').find('.attachment_file').val(file_value);
                            }
                        }             
                    }
                });
                $('.modal-dialog').addClass('modal-sm');
            }
        });
    });

    $(document).on('keydown','.tabkey',function(e){
        if(e.keyCode === 9) { // tab was pressed
            // get caret position/selection
            var start = this.selectionStart;
            var end = this.selectionEnd;

            var $this = $(this);
            var value = $this.val();

            // set textarea value to: text before caret + tab + text after caret
            $this.val(value.substring(0, start)
                        + "\t"
                        + value.substring(end));

            // put caret at right position again (add one for the tab)
            this.selectionStart = this.selectionEnd = start + 1;

            // prevent the focus lose
            e.preventDefault();
        }
    });

    $(document).on('keyup','.ans',function(e){
        setTimeout(function(){
            var que = $('.que').val();
            var ans = $('.ans').val();
            var tmarks = $('.tmarks').val()*1;
            var deduct = $('.deduct').val()*1;
            var data = changed(que,ans,tmarks,deduct);
            $('.marks').val(data[0]);
        },500);
    });

    //letter
    $("#submit_letter").click(function(){
        $('#submit_letter').prop('disabled',true);
        var slc = document.getElementById('letter');
        if (null != slc) {
            slc.Content.SLWord.ServiceCall();
        }

        setTimeout(function(){
            $(".common_save").trigger("click"); 
            $('#submit_letter').prop('disabled',false);
        },1500);
    }); 

    //Statement
    $("#submit_statement").click(function(){
        $('#submit_statement').prop('disabled',true);
        var slc = document.getElementById('statement');
        if (null != slc) {
            slc.Content.SLExcel.ServiceCall();
        }

        setTimeout(function(){
            $(".common_save").trigger("click"); 
            $('#submit_statement').prop('disabled',false);
        },1500);
    });

    //letter Practice
    $("#letter_practice").click(function(){
        var slc = document.getElementById('letter');
        if (null != slc) {
            slc.Content.SLWord.ServiceCall();
        }
    }); 

    //Statement Practice
    $("#statement_practice").click(function(){
        var slc = document.getElementById('statement');
        if (null != slc) {
            slc.Content.SLExcel.ServiceCall();
        }
    });

    $(document).on('click','.active_link' , function(){
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) 
        {
            if(result)
            {
                var id = deleteDiv.attr('rel');
                var url = deleteDiv.attr('rev');             
                var status = deleteDiv.data('status');                
                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data:{id:id,status:status},
                    success:function(data)
                    {
                        bootbox.alert(data.msg, function() {
                            setTimeout(function(){
                                document.location.href=document.location.href;                                
                            },1500);
                        });                       
                    }
                });
            }
        }); 
    });

    $(document).on('click','.chk_update',function()
    {
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',  
            url:completeURL('check_update_pop'),  
            dataType:'json', 
            success: function(data)
            {   
                var dialog = bootbox.dialog({
                    message: data.view
                });
                Metronic.stopPageLoading(); 
            }
        }); 
    });  

    $(document).on('click','.update',function()
    {
        Metronic.startPageLoading({animate: true});
        $.ajax({
            url:'check_update',          
            type:'POST',
            dataType:'json',
            success: function(data)
            {   
                bootbox.alert(data.msg, function() {
                    window.location.href=window.location.href;  
                });
                Metronic.stopPageLoading(); 
            }
        }); 
    });

    $(document).on('click','.get_msceia_student',function()
    {   
        Metronic.startPageLoading({animate: true});
        var url = $(this).attr('rev');
        $.ajax({
            type:'POST',  
            url:completeURL(url),  
            dataType:'json', 
            success: function(data)
            {   
                bootbox.alert(data.msg, function() {
                    window.location.href=window.location.href;  
                });
                Metronic.stopPageLoading(); 
            }
        });
    });

    $(document).on('change','.get_attendance_report',function(e){ 
        var date = $(".months").val();
        var course = $(".course").select2('val');
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL('attendance_report'),
            data:{date:date,course:course},
            dataType:'html',
            success:function(data)
            {      
                $('.form').html($(data).find('.form').html());
            },
            complete:function(){
                Metronic.stopPageLoading();
                $(".date-picker1").datepicker( {
                    format: "M-yyyy",
                    viewMode: "months", 
                    minViewMode: "months",
                    autoclose: true
                });
                    $('.select2').select2();

                // if (jQuery().select2){
                //     $('select').select2('destroy');
                // }
            }
        });
    });

    $(document).on('change','.check_all',function(){
        var id= $(this).attr('rel');
        var ck_class = '.ck_bx_'+id;
        if($(this).is(":checked"))
        {
            $(ck_class).prop('checked', true); 
        }else
        {
            $(ck_class).prop('checked', false);
        }
        $.uniform.update();
    });


    $(document).on('click','.manage_attandance',function(e){ 
        $('.display').toggle();
        $('.edit').toggle();
    });

    $(document).on('change','.course_fee',function(e){
        var fee = $('#fee').val()*1;
        var other_fee = $('#other_fee').val()*1;
        var total_fee =fee + other_fee;
        $('.total_fee').val(total_fee);
    });

    $(document).on('change','.chk_batch',function(){
        var batch=$('.batch_time').select2('val');
        var machin=$('.machin_no').select2('val');
        var id=$('.stud_id').val();
        var this1 = $(this);
        $(this).closest('div').find('.help-block').remove();
        $.ajax({
            type:'POST',
            url:completeURL('chk_batch'),
            data:{id:id,batch:batch,machin:machin},
            dataType:'json',
            success:function(data)
            {    
                if(data.valid)
                {
                    this1.closest('div').append('<span class="help-block">'+data.msg+'</span>');
                    this1.select2('val','');                    
                    this1.closest('.form-group').addClass('has-error');
                    this1.closest('div').find('i').addClass('fa-warning').removeClass('fa-check');                    
                }
                else
                {
                    this1 .closest('.form-group').removeClass('has-error').addClass('has-success');
                    this1.closest('div').find('i').addClass('fa-check').removeClass('fa-warning');
                }

                
            }
        });
    });
    
});

function submit_test()
{
    var form="#test_form";
    var url=$(form).attr("rel");
    var serialize_data=$(form).serialize();
    $(".loding_img").show();
    $.ajax({
        type:'POST',
        url:completeURL(url),
        dataType:'json',
        data:serialize_data,
        success:function(data)
        {
            if(data.valid)
            {
                bootbox.alert(data.msg, function() {
                   location.href=completeURL(data.redirect);
                });  
            }else
            {
                bootbox.alert(data.msg);  
            }
        },
        complete:function()
        {                        
            $(".loding_img").hide();                
        }
    });
}

function test_expiry()
{
    $('html, body').animate({scrollTop:0});
    bootbox.alert("Time Up ! click ok to submit your test.", function(result) {
        submit_test(); 
    });     
}

function changed(que,ans,tmarks,deduct= 0.5) 
{
    var wrong=0;    
    window.diffType="diffWordsWithSpace";
    var diff = JsDiff[window.diffType](que,ans);
    var str = "";
    for (var i=0; i < diff.length; i++) {
        var node;
        var error= $.trim(diff[i].value);
        if (diff[i].removed) {
            var result1 = error.split(' ');
            for(var j = 0; j < result1.length; j++){                
                wrong=wrong+deduct;
            }
            node = '<del>' + diff[i].value + '</del>';
        } else if (diff[i].added) {
            var lastword = str.split("<").pop();
            if(lastword!='/del>')
            {
                wrong=wrong+deduct;
            }
            node = '<ins>' + diff[i].value + '</ins>';
        } else {
            node = diff[i].value;
        }
        str += node;
    }

    marks = tmarks-(wrong);
    if(marks <= 0)
    {
        marks=0;
    }
    return[marks, str];
}

function getCookie(key) 
{
   var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');  
   return keyValue ? keyValue[2] : null;  
} 

function replaceurl(url)
{
    var url1=url.replace("%3A",":"); 
    var url2=url1.replace(/%2F/g,"/");  
    return url2;
}   

function completeURL(url)
{
    try
    {
        var target= getCookie('elearn')+url;
        target=replaceurl(target);
        return replaceurl(target);      
    }
    catch(e)
    {
        alert(e);
    }
}