if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

// Mở cửa sổ chỉ dẫn
function ShowGuide() {
    PopupCenter("https://javascript.info/", "", 720, 450);
}

// Mở cửa sổ thông tin về Share2Q
function About() {
    $.dialog({
        title: `<div class="text-dark" style="font-size:12.25pt">About</div>`,
        closeIcon: true,
        backgroundDismiss: true,
        boxWidth: '35%',
        content:
        `<div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
        <div class="text-justify p-2">
            Share<sup>2Q</sup> là một ứng dụng web để lưu trữ tập tin, phân phối và chia sẻ giải pháp cho cộng đồng sinh viên QNU. Nó cung cấp một không gian dựa trên web mà tập tin có thể được lưu trữ an toàn và chia sẻ với những người khác - ở bất cứ đâu, bất cứ lúc nào.
        </div>`,
    });
}

// Hàm giúp mở cửa sổ popup căn giữa
function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position Most browsers Firefox  
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow  
    if (window.focus) {
        newWindow.focus();
    }
}

// Tạo ra avatar theo tên người dùng
function TopbarAvatar() {
     var colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"];

     var avatarElement = $('.avatar-initials'),
     avatarWidth = avatarElement.attr('width'),
     avatarHeight = avatarElement.attr('height'),
     
     // Tên bắt đầu bằng số hoặc không chứa dấu cách sẽ gây lỗi
     name = avatarElement.data('name')+" ",
     initials = name.split(' ')[0].charAt(0).toUpperCase() + name.split(" ")[1].charAt(0).toUpperCase(),

     charIndex = initials.charCodeAt(0) - 65,
     colorIndex = charIndex % 19;

     avatarElement.css({
      'background-color': colors[colorIndex],
      'width': avatarWidth,
      'height': avatarHeight,
      'font' : "14px Nunito",
      'font-weight' : "600",
      'color': '#ffffff',
      'textAlign': 'center',
      'lineHeight': (++avatarHeight) + "px",
      'borderRadius': '50%'
    })
     .html(initials);
}

// Đặt lại thông tin session
function ResetSession() {
    document.getElementById("user-name").value = document.getElementById("user-namebk").value;
    document.getElementById("user-pass").value = document.getElementById("user-passbk").value;
    document.getElementById("user-email").value = document.getElementById("user-emailbk").value;
}

// Làm mới bảng dữ liệu
function RefreshDataGrid() {
    var sideid = window.localStorage.getItem('sideid');

    if(sideid == 2 || sideid == 4) return;

    $("#dataGrid").DataTable({
        "columnDefs":
        [
            { "width": "0%", "targets": 0 },
            { "width": "40%", "targets": 1 },
            { "width": "12%", "targets": 2 },
        ],
    });
}

// Tải trang nội dung
function LoadDataPage(str) {

    $.post( "content.php", str )
    .done(function( output ) {
        $('.container-fluid').html(output);
        Theming();
        RefreshDataGrid();
    });
}

// Tải lại trang nội dung
function ReloadDataPage() {
    var sideid = window.localStorage.getItem('sideid');

    if(sideid === null)
        $(".side-content[id='2']").click();
    else
    {
        if($(".side-content[id="+sideid+"]").length !== 0)
            $(".side-content[id="+sideid+"]").click();
        else
            $(".side-content[id='2']").click();
    }
}

// Màu sắc sidebar 
function Theming() {
    // Nhớ màu sidebar
    var checkBox = document.getElementById('switch1');
    var theme = window.localStorage.getItem('theme');

    if(theme === null)
        $('#accordionSidebar').addClass('bg-gradient-primary');
    else
        $('#accordionSidebar').addClass(theme);

    checkBox.checked = theme == 'bg-gradient-dark' ? true : false;

    // Nhớ kích thước sidebar
    var sidez = window.localStorage.getItem('sidez');
    if(sidez == 'true')
        $('.sidebar').addClass('toggled');
}


//-----------------------POST AREA

function Signin(id, pass)
{
    $.post( "php/checker.php", { lgnID: id,  lgnPass: pass, ajax: 'true' } )
    .done(function( data ) {
        if(data == "0")
            $.alert(
            {
                content: `Sign in has failed.`,
                boxWidth: '20%',
            });
        else
        {
            location.reload();
        }
    });
}

function Signup(id, pass, repass)
{
    $.post( "php/checker.php", { rgtID: id,  rgtPass: pass, rgtRePass: repass, ajax: 'true' } )
    .done(function( data ) {
        if(data == "0")
            $.alert(
            {
                content: `Registration failed.`,
                boxWidth: '20%',
            });
        else
        {
            alert("Registered for "+id);
        }
    });
}

function SubmitAccountData() {
    var id = document.getElementById("user-id").textContent;
    var name = document.getElementById("user-name").value;
    var pass = document.getElementById("user-pass").value;
    var email = document.getElementById("user-email").value;

    var str = "id=" + id + "&name=" + name + "&pass=" + pass + "&email=" + email;

    $.ajax({
        type: "POST",
        url: "php/update.php",
        data: str,
        success: function(output) {
            $.alert(output);
            document.getElementById("user-naming").innerHTML = document.getElementById("user-name").value;

            document.getElementById("user-namebk").value = document.getElementById("user-name").value;
            document.getElementById("user-passbk").value = document.getElementById("user-pass").value;
            document.getElementById("user-emailbk").value = document.getElementById("user-email").value;
        }
    });
}

// tải file lên server
async function AjaxUpload(form_data)
{
    const result = $.ajax({
        url: 'php/upload.php', // point to server-side PHP script 
        dataType: 'text', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',        
    });

    return result;
}

async function Upload(source)
{
    var id = document.getElementById("user-id").textContent;

    if(source.length > 20)
    {
        $.alert("Exceed the maximum numbers(20) of files is exceeded!");
        return;
    }
    $('#loading').toggleClass('active');
    for (var i = source.length - 1; i >= 0; i--)
    {
        var file_data = source[i];

        var form_data = new FormData();
        form_data.append('afile', file_data);
        form_data.append('ownerid', id);

        var b = await AjaxUpload(form_data);
        if(b == '') 
        {
            $('#loading').removeClass('active');
            $.alert("Has some error!");
        }
        else if(i == 0)
        {
            $('#loading').removeClass('active');
            ReloadDataPage();
        }
    }
    $('#loading').removeClass('active');
}

// Bật ưa thích cho tài liệu
function ToggleStars(id, ref = false)
{
    var uid = $('#user-id').prop('textContent');

    $.post( "php/favorite.php", { togg: id, userid: uid } )
    .done(function( data ) {
        if(data == "0")
        {
            $.alert("Actions not completed!");
            return;
        }
        var s = $('#'+id).find('i');
        s.toggleClass('fa');
        s.toggleClass('far');

        if(ref) ReloadDataPage();
    });
}

// Đồng bộ hóa sao mục ưa thích
function SyncStars()
{
    $( ".star-stat" ).each(function( index ) {
        var id = $(this).attr('id');
        var uid = $('#user-id').prop('textContent');
        var s = $(this).find('i');

        $.post( "php/favorite.php", { check: id,  userid: uid } )
        .done(function( data ) {
            if(data == "1")
            {
                s.addClass('fa');
                s.removeClass('far');
            }
        });
    });
}

function Delete(id)
{
    $.confirm({
        title: 'Delete',
        icon: 'far fa-window-close',
        backgroundDismiss: true,
        type: 'red',
        buttons:
        {
            Yes: {
                action: function () {
                    $.post( "php/delete.php", { id: id } )
                    .done(function( data ) {
                        if(data == "1")
                        {
                            $.alert("Deleted files!");
                            ReloadDataPage();
                        }
                    });                
                }
            },
            No: function () {}
        }
    });
}

//-----------------------GET AREA

function Download(id)
{
    window.location = 'http://localhost/Share2Q/php/download.php?id='+id;
}

function CopyTextToClipboard(t)
{
    const e = document.createElement("input");
    if (e.setAttribute("value", t), e.contentEditable = !0, e.readOnly = !0, document.body.appendChild(e), navigator.userAgent.match(/iphone|ipad|ipod/i)) {
        const n = document.createRange();
        n.selectNodeContents(e);
        const r = getSelection();
        r.removeAllRanges(), r.addRange(n), e.setSelectionRange(0, t.length)
    } else e.select();
    const n = document.execCommand("copy");
    return document.body.removeChild(e), n
}

// Sao chép đường dẫn tài liệu để chia sẻ
function CopyLink(id)
{
    var txt = 'http://localhost/Share2Q/php/download.php?id=' + id;
    CopyTextToClipboard(txt);
    $.alert(
    {
        backgroundDismiss: true,
        title: `<div class="text-warning">Copied</div>`,
        content: `<span class="text-monospace">${txt}</span>`,
        autoClose: 'ok|2000',
    });
}

$(window).bind("load", function() {
    $('#loading').removeClass('active');
});    



$(document).ready(function()
{
    OverlayScrollbars($('.dropdown-list'), {
        scrollbars : {
            autoHide         : "m",
        },
    });

    OverlayScrollbars($('body'), {
        scrollbars : {
            autoHide         : "s",
        },

        callbacks: {
            onScrollStop : function(eventArgs) {

            var scrollInfo = this.scroll();
            var scrollTop = scrollInfo.position.y;

            if(scrollTop > 100)
                $('.scroll-to-top').fadeIn();
            else
                $('.scroll-to-top').fadeOut();
            },
        }
    });

    // Theo dõi click danh mục trên sidebar
    $('.side-content').click(function() {
        $('.side-content').removeClass('active');
        $(this).toggleClass('active');

        var i = $(this).attr('id');
        window.localStorage.setItem('sideid', i);

        var owner = $('#user-id').prop('textContent');
        var loged = ($('.mngx').length !== 0);

        var str = "sideid=" +i+ "&ownerid=" +owner+ "&loged=" +loged; 
        if(i == 2) str = str +"&page=1";

        LoadDataPage(str);
    });    

    // Theo dõi khi nhấn tìm kiếm
    $('.btn-search').on('click', function() { 

        var i = window.localStorage.getItem('sideid');

        if( $('#sdfXS').val() != '')
            skey =  $('#sdfXS').val();
        else
            skey = $('#sdfCM').val();

        if(i == 1 || i == 3)
        {
            var table = $('#dataGrid').DataTable();
            table.search(skey);
            table.draw();
            return;
        }

        var owner = $('#user-id').prop('textContent');
        var str = "sideid=" +i+ "&ownerid=" + owner+ "&skey=" + skey; 
        
        LoadDataPage(str);
    });

    // QUAN TRỌNG!! TẢI LẠI TRANG CHO TRUY CẬP MỚI
    ReloadDataPage();
    TopbarAvatar();

    // Khởi tạo tooltip ccuar bootstrap
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="tooltip"]').on('click', function() {
        $(this).tooltip('hide');
    });

    // Không bo tròn góc vuông
    $('#checkbox1').click(function() {
        $( ".hvr-scale" ).each(function( index ) {
            $(this).toggleClass('card');
        });
    });

    // Theo dõi cài đặt theme sidebar
    $('#switch1').click(function() {
        if(this.checked) {
            window.localStorage.setItem('theme', 'bg-gradient-dark');
            $('#accordionSidebar').removeClass('bg-gradient-primary').addClass('bg-gradient-dark');
        }
        else { 
            window.localStorage.setItem('theme', 'bg-gradient-primary');
            $('#accordionSidebar').removeClass('bg-gradient-dark').addClass('bg-gradient-primary');
        }
    });

    // Theo dõi cài đặt tự động thu gọn sidebar
    $('#switch2').on('click', function() {
        $('#accordionSidebar').toggleClass('autoside');
    });

    $('#accordionSidebar').on('mouseleave', function() {
        if($(this).hasClass('autoside'))
        if(!$(this).hasClass('toggled'))
        $('#sidebarToggle').click();
    });

    $('#accordionSidebar').on('mouseenter', function() {
        if($(this).hasClass('autoside'))
        if($(this).hasClass('toggled'))
        $('#sidebarToggle').click();
    });

    // Đăng xuất
    $('.signout-cmd').on('click', function(){
        $.confirm({
            title: 'Sign out?',
            icon: 'far fa-paper-plane',
            theme: 'supervan',
            type: 'red',
            buttons:
            {
                No: function () {},
                logoutUser: {
                    text: 'Yes',
                    action: function () {
                    window.location = 'http://localhost/Share2Q/php/logout.php';
                    }
                },
            }
        });
    });

    $(document).keydown(function(e) {
        if(e.ctrlKey && e.keyCode == '85')
        {
            e.preventDefault();
            $('#afile').click();
        }
    });

    $('.import-cmd').mousedown(function ()
    {
        $('#afile').click();
    });

    // Click để chọn file tải lên từ url
    $('.import-url').on('mousedown', function() {
        $.confirm({
            title: 'Import',
            icon: 'fa fa-seedling',
            theme: 'material',
            backgroundDismiss: true,
            boxWidth: '35%',
            type: 'blue',


            content:
                `<div class="form-group  mx-1 my-1">
                <label class="text-gray-600">Data will be downloaded from URL below.</label>
                <input type="text" placeholder="Enter your URL..." class="url form-control form-control-sm" required autofocus/>
                </div>`,

            buttons: {
                formSubmit: {
                    text: 'Upload',
                    btnClass: 'btn text-primary font-weight-bold',
                    action: function() {
                        var url = this.$content.find('.url').val();
                        if (!url) {
                            $.alert('Provide a valid URL!');
                            return false;
                        }
                        var owner = $('#user-id').prop('textContent');
                        var str = "url-server=" + url + "&ownerid=" + owner;
                        
                        $.ajax({
                            type: "POST",
                            url: "php/download.php",
                            data: str,
                            success: function(output) {
                                if(output != null)
                                {
                                    $.alert(output);
                                    ReloadDataPage();
                                }  
                                $('#loading').removeClass('active');
                            }
                        });
                        $('#loading').toggleClass('active');
                    }
                },
            },
            onContentReady: function() {
                // you can bind to the form
                var jc = this;
                this.$content.find('form').on('submit', function(e) { // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    });

    // Click để hiện cửa sổ chi tiết từ tin rss
    $('.top-rss').on('click', function() {
        var someValue = $(this).find('.text-truncate').text();
        var str = "rss-id=" + $(this).attr('stt'); 

        $.ajax({
            type: "POST",
            url: 'content.php',
            data: str,
            success: function(output) {
                $.dialog({
                    title: `<div class="text-dark" style="font-size:12.25pt">${someValue}</div>`,
                    closeIcon: true,
                    backgroundDismiss: true,
                    boxWidth: '45%',
                    content:`${output}`,
                });
            }
        });
    });
});


(function ($)
{
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function (e)
    {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled"))
        {
            $('.sidebar .collapse').collapse('hide');
        };

        window.localStorage.setItem('sidez', $(".sidebar").hasClass("toggled"));
    });

    // cập nhật dữ liệu ưa thích khi cần
    $(document).on("draw.dt", '#dataGrid', function (e)
    {
        if (window.localStorage.getItem('sideid') == 1)
            if ($('.mngx').length !== 0)
                SyncStars();
        e.preventDefault();
    });

    // Smooth scrolling using OverlayScrollbars
    $('a.scroll-to-top').click(function ()
    {
        var instance = OverlayScrollbars(document.body,
        {});

        instance.scroll(0, 500,
        {
            x: "linear",
            y: "easeOutElastic"
        });
    });

    $('footer').on("contextmenu", function(e){
        e.preventDefault();

        if (document.fullscreenElement) 
            document.exitFullscreen()
        else 
            document.documentElement.requestFullscreen()            
    });


})(jQuery); // End of use strict
