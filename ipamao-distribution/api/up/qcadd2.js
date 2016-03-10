   function tj() {
        if ($.trim($("input[name=title]").val()) == "") {
            alert("请填写商品名称");
            return false
        }
       /* if ($.trim($("input[name=headimg]").val()) == "") {
            alert("请上传头像");
            return false
        }*/
        if ($("input[name=codeimg]").val() == "") {
            alert("请上传我的二维码");
            return false
        }
        if ($("input[name=goodimg]").val() == "") {
            alert("请上传商品图片");
            return false
        }
        if ($("input[name=xianjia]").val() == "") {
            alert("请填写价格");
            return false
        }
        if ($("input[name=yuanjia]").val() == "") {
            alert("请填写原价");
            return false
        }
        //$("#codeform").submit()
    };

$(function() {

    
    var bar = $(".bar");
    var percent = $(".percent");
    var showimg = $("#showimg");
    var progress = $(".progress");
    var files = $(".files");
    var btn = $(".btn spans");
    var btn1 = $(".btns");
    $("#fileupload").wrap("<form id='myupload' action='/api/up/upimg.php?a=qcimg&r=" + Math.random() + "' method='post' enctype='multipart/form-data'></form>");
    $("#fileupload").change(function() {
        $("#myupload").ajaxSubmit({
            dataType: "json",
            beforeSend: function() {
                showimg.empty();
                progress.show();
                var percentVal = "0%";
                bar.width(percentVal);
                bar.show();
                btn.show();
                btn1.show();
                files.hide();
                percent.show();
                percent.html(percentVal);
                btn.html("上传中...")
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + "%";
                bar.width(percentVal);
                percent.html(percentVal)
            },
            success: function(data) {
                var err = data.err;
                if (err) {
                    btn.html("重新上传");
                    bar.width("0");
                    percent.hide();
                    files.html('<font style="color:red">' + err + "</font>");
                    files.show();
                    $("input[name=codeimg]").val("")
                } else {
                    var img = data.pic;
                    var key = data.key;
                    var upid = data.upid;
                    percent.hide();
                     progress.hide();
                    files.hide();
                    bar.hide();
                    btn.hide();
                    btn1.hide();
                    //if (img.indexOf("http://") < 0) {
                     //   img = "http://m.chaojirm.com/static/qcimg" + img
                    //}
                    showimg.html("<span><img src='" + img + "' width='100' class='qcimg'><span class='delimg' rel='" + img + "'>删除</span></span>");
                    btn.html("图片上传");
                    $("input[name=codeimg]").val(img);
                    $("input[name=codeimg_upid]").val(upid)
                }
            },
            error: function(xhr) {
                alert();
                btn.html("重新上传");
                bar.width("0");
                percent.hide();
                files.show();
                files.html('<font style="color:red">图片上传失败!</font>');
                $("input[name=codeimg]").val("")
            }
        })
});
$(".delimg").live("click",
    function() {
        var pic = $(this).attr("rel");
        percent.hide();
        bar.hide();
        btn.show();
        btn1.show();
        files.hide();
        showimg.empty();
        progress.hide();
        $("input[name=headimg]").val("")
    });
var bar1 = $(".bar1");
var percent1 = $(".percent1");
var showimg1 = $("#showimg1");
var progress1 = $(".progress1");
var files1 = $(".files1");
var btn2 = $(".btn1 span");
var btn3 = $(".btn1");
$("#fileupload1").wrap("<form id='myupload1' action='/api/up/upimg.php?a=himg&r=" + Math.random() + "' method='post' enctype='multipart/form-data'></form>");
$("#fileupload1").change(function() {
    $("#myupload1").ajaxSubmit({
        dataType: "json",
        beforeSend: function() {
            showimg1.empty();
            progress1.show();
            var percentVal = "0%";
            bar1.width(percentVal);
            bar1.show();
            btn2.show();
            btn3.show();
            files1.hide();
            percent1.show();
            percent1.html(percentVal);
            btn2.html("上传中...")
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + "%";
            bar1.width(percentVal);
            percent1.html(percentVal)
        },
        success: function(data) {
            var err = data.err;
            if (err) {
                btn2.html("重新上传");
                bar1.width("0");
                percent1.hide();
                files1.html('<font style="color:red">' + err + "</font>");
                files1.show();
                $("input[name=headimg]").val("")
            } else {
                var img = data.pic;
                var key = data.key;
                var upid = data.upid;
                percent1.hide();
                files1.hide();
                bar1.hide();
                btn2.hide();
                btn3.hide();
                    /*if (img.indexOf("http://") < 0) {
                        img = "http://m.chaojirm.com/static/qcimg" + img
                    }*/
                    showimg1.html("<span><img src='" + img + "' width='100' class='qcimg'><span class='delimg1' rel='" + img + "'>删除</span></span>");
                    btn2.html("图片上传");
                    $("input[name=headimg]").val(img);
                    $("input[name=headimg_upid]").val(upid)
                }
            },
            error: function(xhr) {
                btn2.html("重新上传");
                bar1.width("0");
                percent1.hide();
                files1.show();
                files1.html('<font style="color:red">图片上传失败!</font>');
                $("input[name=headimg]").val("")
            }
        })
});
$(".delimg1").live("click",
    function() {
        var pic = $(this).attr("rel");
        percent1.hide();
        bar1.hide();
        btn2.show();
        btn3.show();
        files1.hide();
        showimg1.empty();
        progress1.hide();
        $("input[name=headimg]").val("")
    })



var bar2 = $(".bar2");
var percent2 = $(".percent2");
var showimg2 = $("#showimg2");
var progress2 = $(".progress2");
var files2 = $(".files2");
var btn4 = $(".btn2 span");
var btn5 = $(".btn2");
$("#fileupload2").wrap("<form id='myupload2' action='/api/up/upimg.php?a=simg&r=" + Math.random() + "' method='post' enctype='multipart/form-data'></form>");
$("#fileupload2").change(function() {
    $("#myupload2").ajaxSubmit({
        dataType: "json",
        beforeSend: function() {
            showimg2.empty();
            progress2.show();
            var percentVal = "0%";
            bar2.width(percentVal);
            bar2.show();
            btn4.show();
            btn5.show();
            files2.hide();
            percent2.show();
            percent2.html(percentVal);
            btn4.html("上传中...")
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + "%";
            bar2.width(percentVal);
            percent2.html(percentVal)
        },
        success: function(data) {
            var err = data.err;
            if (err) {
                btn4.html("重新上传");
                bar2.width("0");
                percent2.hide();
                files2.html('<font style="color:red">' + err + "</font>");
                files2.show();
                $("input[name=goodimg]").val("")
            } else {
                var img = data.pic;
                var key = data.key;
                var upid = data.upid;
                percent2.hide();
                files2.hide();
                bar2.hide();
                btn4.hide();
                btn5.hide();
                    /*if (img.indexOf("http://") < 0) {
                        img = "http://m.chaojirm.com/static/qcimg" + img
                    }*/
                    showimg2.html("<span><img src='" + img + "' width='100' class='qcimg'><span class='delimg1' rel='" + img + "'>删除</span></span>");
                    btn4.html("图片上传");
                    $("input[name=goodimg]").val(img);
                    $("input[name=headimg_upid]").val(upid)
                }
            },
            error: function(xhr) {
                btn4.html("重新上传");
                bar2.width("0");
                percent2.hide();
                files2.show();
                files2.html('<font style="color:red">图片上传失败!</font>');
                $("input[name=goodimg]").val("")
            }
        })
});
$(".delimg2").live("click",
    function() {
        var pic = $(this).attr("rel");
        percent2.hide();
        bar2.hide();
        btn4.show();
        btn5.show();
        files2.hide();
        showimg2.empty();
        progress2.hide();
        $("input[name=goodimg]").val("")
    })
});