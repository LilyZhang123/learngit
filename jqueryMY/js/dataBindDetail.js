/*
 * Description: 双向绑定商家授信详情
 * Author：章力
 * Create-Date：2016-11-24
 * Modify-Date:
 */
define(function (require, exports, module) {
    "use strict";
    var util = require("util");
    var jquerymy = require("jquerymy");
    var shareholder = $("#insert-area").find('#shareholder');//股东
    var company_id ="",user_id="",mobile="",allData = {},shareholderIndex,BaseData = {};
    allData.shareholderData = [];
    allData.delShareholder = [];
   
    var flag = true,firstLoad = true,getBrandFlag = true;
    var carInfoList=[],count = 0,urlData = util.getUrlParam();

    // 上传文件
    var filesUploader = function(btn,hiddenInput,imageArea){
        var uploader = new plupload.Uploader({ //实例化一个plupload上传对象
        browse_button : btn,
        url : uploaderUrl,
        filters : {
            mime_types : [ //只允许上传图片
                { title : 'Image files', extensions : 'jpg,jpeg,png,pdf' }
            ],
            max_file_size : '5120kb', //文件大小
        },
        multipart_params : {  //附加参数
            _token : Token,
        },
        //unique_names : true,  //上传的文件生成唯一的name值
        multi_selection : false
        });
        uploader.init(); //初始化
        
        //绑定文件添加进队列事件
        uploader.bind('FilesAdded', function(uploader, files){
            uploader.start(); //开始上传
        });
        var uploaded_html = '';  //已上传的图片展示
        var path;
        
        //绑定单个文件上传完成后事件
        uploader.bind('FileUploaded', function(uploader, file, res){
            // console.log(res);
            var r = JSON.parse(res.response);
            path = r.data;
            uploaded_html = '<img width="100%" style="max-width:150px" src="/data/attachment/' +  path + '" />';
        });
        
        //绑定所有文件上传完成后事件
        uploader.bind('UploadComplete', function(uploader, files){
            $("#"+imageArea).html(uploaded_html);
            uploaded_html = '';
            $("#"+hiddenInput).val(path);
            uploader.files.length = 0;  //清空上传队列

        });
    };
    var renderHTMl = function (data) {
        console.log(data[0]);
        BaseData = data[0];
        var obj ={};

        var demo = $('[data-line]');
        for (var i = demo.length - 1; i >= 0; i--) {
            obj["[name="+ demo.eq(i).attr("name") +"]"] = demo.eq(i).attr("name");
        }
        var imgDemo = $('[data-type]');
        for (var i = imgDemo.length - 1; i >= 0; i--) {
            for (var j=data[0].files.length-1;j >= 0;j--){
                if (data[0].files[j].file_type == imgDemo.eq(i).attr("data-type")) {
                    // obj["[name="+ imgDemo.eq(i).attr("name") +"]"] = files[j].file_url;

                    obj["[name="+ imgDemo.eq(i).attr("name") +"]"] = imgDemo.eq(i).attr("name");
                    BaseData[imgDemo.eq(i).attr("name")] = data[0].files[j].file_url;
                }
            }
            
        }


        console.log(obj);

        $("#form").my({ui:obj}, BaseData);
    };

    var getInitData = function () {
        $.ajax({
            url : listUrl,
            type : "GET",
            data : {
                id:urlData.id
            },
            success : function (data) {
                if (data.code == 0) {
                    renderHTMl(data.data);
                }
            }
        });
    };
   
    // 添加备注信息
    var addRemark = function () {
        var content = $('#recordContent').val();
        $.ajax({
            url : addRemarkUrl,
            type : "POST",
            data: { id : urlData.id ,
                    remark: content,
                    _token:Token
                },
            success : function (data) {
                if (data.code == 0) {
                    swal("成功","备注已新增","success");
                    $("#addRecords").modal("hide");
                    $('#recordContent').val("");
                    getRemarkFun();
                }else{
                    swal("失败",data.msg,"error");   
                }
            }
        });
    };
    // 添加股东
    var addShareholder = function(){
        var name=$("#addShareholder-area").find("[name=name]").val(); //姓名
        var id_number=$("#addShareholder-area").find("[name=id_number]").val(); //证件号
        var funding=$("#addShareholder-area").find("[name=funding]").val();//出资
        var percentage=$("#addShareholder-area").find("[name=percentage]").val();//占比
        var remark=$("#addShareholder-area").find("[name=remark]").val();//占比

        // 从最后一个设置id
        var key = allData.shareholderData.length;
        // var dataId = allData.shareholderData[key].id +1;

        var html = "<tr data-id="+key+" id="+key+">";
            html+="<td data-name='name'>"+name+"</td>";
            html+="<td data-name='id_card'>"+id_number+"</td>";
            html+="<td data-name='funding'>"+funding+"</td>";
            html+="<td data-name='percentage'>"+percentage+"</td>";
            html+="<td data-name='remark'>"+remark+"</td>";
            html+="<td><button class='btn btn-primary btn-xs shareholder-modify' type='button'>修改</button><button class='btn btn-danger btn-xs shareholder-delete' type='button'>删除</button></td>";
            html+="</tr>";
        $("#shareholder").append(html);
       
        allData.shareholderData.push({
            // "id":dataId,
            "name":name,
            "id_number":id_number,
            "funding":funding,
            "percentage":percentage,
            "remark":remark
        });

        $("#addShareholder-area").find("[name=name]").val(""); //姓名
        $("#addShareholder-area").find("[name=id_number]").val(""); //证件号
        $("#addShareholder-area").find("[name=funding]").val("");//出资
        $("#addShareholder-area").find("[name=percentage]").val("");//占比
        $(".addShareholder-area").modal("hide");
    };
    //删除股东
    var deleteShareholder = function(self) {
        var id=Number($(self).parents("tr").attr("data-id"));

        if (typeof id != "undefined") {
            allData.delShareholder.push(allData.shareholderData[id].id);
        }

        allData.shareholderData.splice(id,1);

        anewForShareholder(allData.shareholderData);
    };
    //重新渲染股东数据
    var anewForShareholder=function(param){
        $("#shareholder").html("");

        for (var i = 0; allData.shareholderData.length > i; i++) {

            var html = "<tr data-id="+i+" id="+i+">" +
                            "<td data-name='name'>"+allData.shareholderData[i].name+"</td>" +
                            "<td data-name='id_card'>"+allData.shareholderData[i].id_number+"</td>" +
                            "<td data-name='funding'>"+allData.shareholderData[i].funding+"</td>" +
                            "<td data-name='percentage'>"+allData.shareholderData[i].percentage+"</td>" +
                            "<td data-name='remark'>"+allData.shareholderData[i].remark+"</td>" +
                            "<td><button class='btn btn-primary btn-xs shareholder-modify' type='button'>修改</button><button class='btn btn-danger btn-xs shareholder-delete' type='button'>删除</button></td>" +
                        "</tr>";

            $("#shareholder").append(html);
        }
    }
    //修改股东
    var modifyShareholder=function (self) {
        var name=$("#modifyShareholder-area").find("[name=name]").val(); //姓名
        var id_number=$("#modifyShareholder-area").find("[name=id_card]").val(); //证件号
        var funding=$("#modifyShareholder-area").find("[name=funding]").val();//出资
        var percentage=$("#modifyShareholder-area").find("[name=percentage]").val();//占比
        var remark=$("#modifyShareholder-area").find("[name=remark]").val();//占比
        var td=$("#shareholder tr").eq(shareholderIndex).find("td");

        allData.shareholderData[shareholderIndex].name =name;
        allData.shareholderData[shareholderIndex].id_number =id_number;
        allData.shareholderData[shareholderIndex].funding =funding;
        allData.shareholderData[shareholderIndex].percentage =percentage;
        allData.shareholderData[shareholderIndex].remark =remark;

        for (var i = 0; td.length > i; i++) {
            td.eq(i).text(allData.shareholderData[shareholderIndex][td.eq(i).attr("data-name")]);
        }

        $('#modifyShareholder-area').modal('hide');
    };
    // 总监通过
    var managerPassFun = function () {
        var first_trial = $("#insert-area").find("[name=first_trial]").val();
        var recheck = $("#insert-area").find("[name=recheck]").val();
        $.ajax({
            url : passUrl,
            type : "GET",
            data: { id :urlData.id,   // 金融id
                    user_id:user_id,
                    mobile  : mobile,// 用户手机号
                    first_trial  : first_trial,// 初审
                    recheck  : recheck,// 复审
                    type: data.type
                },
            success : function (data) {
                if (data.code == 0) {
                    swal("成功","已通过","success");
                }else{
                    swal("失败",data.msg,"error");   
                }
            }
        });
    };
    //专员审批通过
    var normalPassFun = function () {
        var content = $("#pass-content").val();
        $.ajax({
            url : submitCreditUrl,
            type : "GET",
            data: { id :urlData.id,   // 金融id
                    content: content,  // 征信的内容
                    type: data.type // type值
                },
            success : function (data) {
                if (data.code == 0) {
                    swal("成功","已通过","success");
                }else{
                    swal("失败",data.msg,"error");   
                }
            }
        });
    };
    // 打回修改
    var modifyFun = function() {
        var content=$("#modify-content").val();
        $.ajax({
            url : modifyUrl,
            type : "GET",
            data: { id : urlData.id,
                    content :content, // 用户id
                    mobile  : mobile,// 用户手机号
                    type: data.type
                },
            success : function (data) {
                if (data.code == 0) {
                    swal("成功","已打回修改","success");
                    $("#modify-area").modal("hide");
                }else{
                    swal("失败",data.msg,"error");   
                }
            }
        });
    };
    // 驳回
    var rejectFun = function() {
        var content=$("#reject-content").val();
        $.ajax({
            url : rejectUrl,
            type : "GET",
            data: {
                    id : urlData.id,   // finance_id
                    user_id :user_id, // 用户id
                    mobile  : mobile,// 用户手机号
                    content  : content// 用户手机号
                },
            success : function (data) {
                if (data.code == 0) {
                    swal("成功","已驳回","success");
                    $("#reject-area").modal("hide");
                }else{
                    swal("失败",data.msg,"error");   
                }
            }
        });
    };
    var renderShareholderHTMl = function(data){
        var template = Handlebars.compile(ShareholderDPL);
        var html = template({data:data});
        $('#shareholder').empty().append(html);
    };
    // getShareholderUrl 获取股东
    var getShareholderFun = function() {
        $.ajax({
            url : getShareholderUrl,
            type : "GET",
            data: { company_id :company_id,   // 金融id
                },
            success : function (data) {
                if (data.code == 0) {
                    renderShareholderHTMl(data.data);
                    allData.shareholderData = data.data;
                }else{
                    swal("失败",data.msg,"error");   
                }
            }
        });
    };
    
    // 图片数据
    var getUploaderData = function () {
        var demo = $("#insert-area").find("[data-type]");
        BaseData.files =[];
        for (var i = demo.length - 1; i >= 0; i--) {
          BaseData.files.push({"file_type": demo.eq(i).attr("data-type"),"file_url": demo.eq(i).val()});
        }
    };
    
    var saveAllFun = function(){
        console.log(BaseData);
        getUploaderData();
        console.log(BaseData);
        // $.ajax({
        //     url : saveUrl,
        //     type : "POST",
        //     data: allData,
        //     success : function (data) {
        //         if (data.code == 0) {
        //             swal("成功",data.msg,"success"); 
        //             var url = "./approval"+data.type;
        //             window.location.href = url;
        //         }else{
        //             swal("失败",data.msg,"error");   
        //         }
        //     }
        // });
    };
    //渲染修改数据
    var renderModifyData = function (self) {
        shareholderIndex = Number($(self).parents("tr").attr("data-id"));
        var id = self.parent().parent().attr('data-id');
        $("#"+id+" td").each(function(){
            var tag = $(this).attr("data-name");
            if(tag !== undefined) {
                $("#modifyShareholder-area").find("[data-name='"+tag+"']").val($(this).html());
                $("#modifyShareholder-area").find("[data-name='"+tag+"']").html($(this).html());
            }
        });
    }

    //事件绑定
    var bindUI = function () {
        $("#addShareholder-area").on("click",".save-Shareholder-btn",addShareholder);//增加股东；
        // $("#addRecords").on("click",".confirm-records",saveAllFun);//保存
        $("#form").on("click",".save-all-btn",saveAllFun);//保存
        

        $("#passContent").on("click",".normal-pass-btn",normalPassFun); 

        $("#insert-area").on("click",".shareholder-delete",function () {
            deleteShareholder($(this));
        });//删除股东 
        $("#insert-area").on("click",".shareholder-modify-btn",function () {
            modifyShareholder($(this));
        });//修改股东

        $("#insert-area").on("click",".shareholder-modify",function () {
            $('#modifyShareholder-area').modal('show');
            renderModifyData($(this));
        });//打开修改股东弹窗，渲染数据            
    };

    exports.init = function () {
        filesUploader('authorization-btn','authorization','authorization-img');//授权书
        filesUploader('house_contract-btn','house_contract','house_contract-img');//房屋合同或者租赁照
        filesUploader('pengyuan-btn','pengyuan','pengyuan-img');//鹏元
        filesUploader('qixin-btn','qixin','qixin-img');//企信
        filesUploader('other_credit-btn','other_credit','other_credit-img');//其它征信
        filesUploader('car_contract-btn','car_contract','car_contract-img');//汽车代购服务框架合同
        filesUploader('nature_sponsoring_state-btn','nature_sponsoring_state','nature_sponsoring_state-img');//担保合同（适用自然人）
        filesUploader('business_sponsoring_state-btn','business_sponsoring_state','business_sponsoring_state-img');//担保合同（适用对公）
        filesUploader('contracts_on_behalf-btn','contracts_on_behalf','contracts_on_behalf-img');//委托代购合同
        filesUploader('serve_cobtracts-btn','serve_cobtracts','serve_cobtracts-img');//商品车运输服务合同

        filesUploader('business_license-btn','business_license','business_license-img');//营业执照原件
        filesUploader('hand_idcard-btn','hand_idcard','hand_idcard-img');//法人代表手持身份证
        filesUploader('idcard_front-btn','idcard_front','idcard_front-img');//法人代表身份证正面
        filesUploader('idcard_back-btn','idcard_back','idcard_back-img');//法人代表身份证反面
        filesUploader('autho_idcard_front-btn','autho_idcard_front','autho_idcard_front-img');//授权人身份证正面
        filesUploader('autho_idcard_back-btn','autho_idcard_back','autho_idcard_back-img');//授权人身份证反面
        filesUploader('shop_picture-btn','shop_picture','shop_picture-img');//门店照片

        $("#date-pick").datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
        $('[name=contacts]').val("1122")
        getInitData();
        bindUI();
    }
});