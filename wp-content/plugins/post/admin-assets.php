<?php
function mip_output_admin_assets() {
    $screen = get_current_screen();
    if ( is_object($screen) && ($screen->id === 'insta_post' || $screen->id === 'toplevel_page_my_insta_page_settings') ) {
        wp_enqueue_media();
        wp_enqueue_script('jquery-ui-sortable');
    ?>
    <style>
        #mip_gallery_container .mip-gallery-images { display: flex; flex-wrap: wrap; gap: 10px; margin: 10px 0; padding: 0; }
        #mip_gallery_container .mip-gallery-images li { position: relative; list-style: none; width: 100px; height: 100px; border: 1px solid #ccc; cursor: move; background: #f0f0f0; }
        #mip_gallery_container .mip-gallery-images li img { width: 100%; height: 100%; object-fit: cover; display: block; }
        #mip_gallery_container .mip-gallery-images li .delete {
            position: absolute; top: 0; right: 0; width: 20px; height: 20px; background: rgba(0,0,0,0.7);
            color: white; text-decoration: none; text-align: center; line-height: 20px; font-weight: bold;
        }
        #mip_gallery_container .mip-gallery-images li .delete:hover { background: #c00; }
    </style>
    <script>
        jQuery(function($) {
            if ($('body').hasClass('post-type-insta_post')) {
                function updateGalleryIds() {
                    const ids = [];
                    $('.mip-gallery-images li.image').each(function() {
                        const id = $(this).attr('data-attachment_id');
                        if (id) ids.push(id);
                    });
                    $('#mip_gallery_image_ids').val(ids.join(','));
                }
                $('.mip-gallery-images').sortable({
                    items: 'li.image',
                    cursor: 'move',
                    update: updateGalleryIds
                });
                $('.add-mip-gallery-images').on('click', function(event) {
                    event.preventDefault();
                    const frame = wp.media({
                        title: 'افزودن به گالری',
                        button: { text: 'افزودن' },
                        multiple: true,
                        library: { type: ['image', 'video'] }
                    });
                    frame.on('select', function() {
                        const selection = frame.state().get('selection');
                        const currentIds = $('#mip_gallery_image_ids').val().split(',').filter(id => id);
                        selection.each(function(attachment) {
                            attachment = attachment.toJSON();
                            if (attachment.id && !currentIds.includes(attachment.id.toString())) {
                                const thumbUrl = (attachment.sizes && attachment.sizes.thumbnail) ? attachment.sizes.thumbnail.url : attachment.url;
                                const imageHtml = `<li class="image" data-attachment_id="${attachment.id}">
                                    <img src="${thumbUrl}" />
                                    <a href="#" class="delete" title="حذف">×</a>
                                </li>`;
                                $('.mip-gallery-images').append(imageHtml);
                                currentIds.push(attachment.id);
                            }
                        });
                        updateGalleryIds();
                    });
                    frame.open();
                });
                $('.mip-gallery-images').on('click', 'a.delete', function(event) {
                    event.preventDefault();
                    $(this).closest('li.image').remove();
                    updateGalleryIds();
                });
            }
            $('#mip-upload-btn').on('click', function(e) {
                e.preventDefault();
                const frame = wp.media({ title: 'آپلود عکس پروفایل', multiple: false, library: { type: 'image' } }).open()
                    .on('select', function() {
                        const uploadedImage = frame.state().get('selection').first().toJSON();
                        $('#mip_profile_picture').val(uploadedImage.url);
                    });
            });
        });
    </script>
    <?php
    }
}
add_action('admin_footer', 'mip_output_admin_assets');
?>