jQuery(document).ready(function ($) {
    // فعال‌سازی انتخاب‌گر رنگ وردپرس
    $('.lto-color-picker').wpColorPicker();

    // مدیریت آپلودر تصویر وردپرس
    $('.lto-upload-button').on('click', function (e) {
        e.preventDefault();

        var button = $(this);
        var targetId = button.data('target-id');
        var frame;

        // اگر فریم مدیا از قبل ساخته شده، آن را باز کن
        if (frame) {
            frame.open();
            return;
        }

        // ساخت یک فریم جدید مدیا
        frame = wp.media({
            title: 'انتخاب یا آپلود تصویر',
            button: {
                text: 'استفاده از این تصویر'
            },
            multiple: false // اجازه انتخاب چند فایل را نده
        });

        // وقتی یک تصویر انتخاب می‌شود
        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            
            // قرار دادن آدرس تصویر در فیلد متنی
            $('#' + targetId).val(attachment.url);
            
            // نمایش پیش‌نمایش تصویر
            $('#' + targetId + '-preview').html('<img src="' + attachment.url + '" style="max-width:200px; height:auto;" />');
        });

        // باز کردن فریم مدیا
        frame.open();
    });
});
document.getElementById('nav').innerText="فراموشی رمز عبور!"
// amir-naseri.ir