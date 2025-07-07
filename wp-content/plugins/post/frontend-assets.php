<?php
function mip_output_assets()
{
    global $post;
    if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'my_insta_page')) {
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', [], '5.15.4');
?>
        <style>
            :root {
                --background-main: #fafafa;
                --border-color: #dadada;
                --text-primary: #262626;
                --font-system: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                --modal-backdrop: rgba(0, 0, 0, 0.3);
            }

            * {
                box-sizing: border-box;
            }

            body.mip-modal-open {
                overflow: hidden;
            }

            .mip-container {
                /* font-family: var(--font-system); */
                max-width: 93.5rem;
                margin: 0 auto;
                padding: 0 2rem;
                color: var(--text-primary);
                background-color: var(--background-main);
            }

            .mip-profile {
                display: grid;
                grid-template-columns: 1fr 2fr;
                grid-template-rows: repeat(3, auto);
                grid-column-gap: 3rem;
                align-items: start;
                padding: 5rem 0;
                justify-content: space-evenly;
                align-content: stretch;
            }

            .mip-profile-image {
                grid-row: 1 / -1;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .mip-profile-image img {
                width: 15rem;
                height: 15rem;
                border-radius: 50%;
                object-fit: cover;
            }

            .mip-profile-info {
                grid-column: 2 / 3;
            }

            .mip-profile-name {
                font-size: 3.2rem;
                font-weight: 300;
                display: inline-block;
                margin: 0;
            }

            .mip-profile-name .profile-stats {
                font-size: 1.6rem;
                font-weight: 600;
                margin-left: 2rem;
            }

            .mip-profile-bio {
                font-size: 1.6rem;
                font-weight: 400;
                line-height: 1.5;
                margin-top: 2.3rem;
            }

            .mip-posts-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
                grid-gap: 2rem;
                padding-bottom: 3rem;
                border-top: 1px solid var(--border-color);
                margin-top: 4rem;
            }

            .mip-post-item {
                position: relative;
                aspect-ratio: 1 / 1;
                cursor: pointer;
                background: #efefef;
            }

            .mip-post-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }

            .mip-post-item .gallery-item-info {
                position: absolute;
                bottom: 0;
                right: 0;
                padding: 0.5rem 1rem;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }

            .mip-post-item .gallery-item-info ul {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                font-size: 1.5rem;
                font-weight: 600;
                color: #fff;
            }

            .mip-post-item .gallery-item-info li {
                display: inline-block;
                margin-left: 1rem;
            }

            .mip-post-item .gallery-item-likes {
                cursor: default;
            }

            .mip-post-item .gallery-item-likes.liked .fas.fa-heart {
                color: #ed4956;
            }

            .mip-post-item .gallery-item-type {
                position: absolute;
                top: 1rem;
                right: 1rem;
                font-size: 2.5rem;
                text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1);
                color: #fff;
            }

            .mip-post-item .gallery-item-type .fa-clone,
            .mip-post-item .gallery-item-type .fa-video {
                transform: rotateY(180deg);
            }

            .mip-modal-overlay {
                position: fixed;
                inset: 0;
                background: var(--modal-backdrop);
                display: none;
                align-items: center;
                justify-content: center;
                z-index: 99999;
                padding: 2rem;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .mip-modal-overlay.visible {
                display: flex;
                opacity: 1;
            }

            .mip-modal-content {
                background: #fff;
                display: grid;
                grid-template-columns: 2fr 1fr;
                width: 100%;
                max-width: 120rem;
                max-height: 80vh;
                border-radius: 0.3rem;
                overflow: hidden;
                box-shadow: 0 0.4rem 3rem rgba(0, 0, 0, 0.1);
            }

            .mip-modal-slider {
                position: relative;
                background: #000;
                overflow: hidden;
            }

            .mip-slider-container {
                display: flex;
                height: 100%;
                width: 100%;
                transition: transform 0.4s ease;
                transform: translateX(0);
            }

            .mip-slide {
                flex: 0 0 100%;
                max-width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mip-slide img,
            .mip-slide video {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
            }

            .mip-modal-info {
                padding: 2rem;
                border-left: 1px solid var(--border-color);
                display: flex;
                flex-direction: column;
            }

            .mip-modal-info .mip-profile-header {
                display: flex;
                align-items: center;
                margin-bottom: 2rem;
            }

            .mip-modal-info img {
                width: 4rem;
                height: 4rem;
                border-radius: 50%;
                margin-right: 1rem;
            }

            .mip-modal-info h3 {
                font-size: 1.4rem;
                font-weight: 600;
                margin: 0;
            }

            .mip-modal-info p {
                font-size: 1.4rem;
                margin: 1rem 0 0;
                line-height: 1.5;
            }

            .mip-modal-info .gallery-item-likes {
                cursor: pointer;
                font-size: 1.4rem;
                font-weight: 600;
                margin-top: 1rem;
                color: var(--text-primary);
            }

            .mip-modal-info .gallery-item-likes.liked .fas.fa-heart {
                color: #ed4956;
            }

            .mip-modal-close {
                position: absolute;
                top: 1rem;
                right: 1rem;
                z-index: 100000;
                cursor: pointer;
                color: #fff;
                background: rgba(0, 0, 0, 0.5);
                width: 4rem;
                height: 4rem;
                border-radius: 50%;
                text-align: center;
                line-height: 4rem;
                font-size: 2.4rem;
            }

            .mip-slider-nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                z-index: 10;
                cursor: pointer;
                background: rgba(0, 0, 0, 0.5);
                color: #fff;
                border: none;
                width: 4rem;
                height: 4rem;
                border-radius: 50%;
                font-size: 2rem;
                line-height: 4rem;
                transition: background 0.2s;
            }

            .mip-slider-nav:hover {
                background: rgba(0, 0, 0, 0.7);
            }

            .mip-slider-nav.hidden {
                display: none;
            }

            .mip-slider-nav.prev {
                left: 2rem;
            }

            .mip-slider-nav.next {
                right: 2rem;
            }

            .visually-hidden {
                position: absolute !important;
                height: 1px;
                width: 1px;
                overflow: hidden;
                clip: rect(1px, 1px, 1px, 1px);
            }

            @media (max-width: 40rem) {
                .mip-container {
                    padding: 0 1.5rem;
                }

                .mip-profile {
                    grid-template-columns: auto 1fr;
                    grid-row-gap: 1.5rem;
                    padding: 4rem 0;
                }

                .mip-profile-image {
                    grid-row: 1 / 2;
                }

                .mip-profile-image img {
                    width: 7.7rem;
                    height: 7.7rem;
                }

                .mip-profile-info {
                    grid-column: 1 / -1;
                    margin-top: 1rem;
                }

                .mip-profile-name {
                    font-size: 2.2rem;
                }

                .mip-profile-bio {
                    font-size: 1.4rem;
                    margin-top: 1.5rem;
                }

                .mip-posts-grid {
                    grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
                    grid-gap: 1rem;
                }

                .mip-modal-content {
                    grid-template-columns: 1fr;
                    max-height: 90vh;
                }

                .mip-modal-info {
                    border-left: none;
                    border-top: 1px solid var(--border-color);
                }
            }

            /* Fallback for browsers that don't support CSS Grid */
            .no-grid .mip-profile {
                display: flex;
                flex-wrap: wrap;
                padding: 5rem 0;
            }

            .no-grid .mip-profile-image,
            .no-grid .mip-profile-info {
                width: auto;
            }

            .no-grid .mip-profile-image {
                flex: 0 0 33.333%;
                margin-right: 3rem;
            }

            .no-grid .mip-profile-info {
                flex: 0 0 calc(66.666% - 3rem);
            }

            .no-grid .mip-posts-grid {
                display: flex;
                flex-wrap: wrap;
                margin: -1rem;
            }

            .no-grid .mip-post-item {
                flex: 1 0 22rem;
                margin: 1rem;
            }

            @media (max-width: 40rem) {
                .no-grid .mip-profile {
                    flex-direction: column;
                    align-items: flex-start;
                    padding: 4rem 0;
                }

                .no-grid .mip-profile-image,
                .no-grid .mip-profile-info {
                    flex: 0 0 100%;
                    margin-right: 0;
                }

                .no-grid .mip-profile-image {
                    margin-bottom: 2rem;
                }
            }
        </style>





        <script>
            jQuery(document).ready(function($) {
                const body = $('body');
                const modal = $('#mip-modal');
                if (!modal.length) return;

                const sliderContainer = modal.find('.mip-slider-container');
                const modalInfo = modal.find('.mip-modal-info');
                const navPrev = modal.find('.mip-slider-nav.prev');
                const navNext = modal.find('.mip-slider-nav.next');

                let currentGallery = [];
                let currentIndex = 0;
                let currentPostId = 0;

                // Get liked posts from cookie for non-logged-in users
                function getLikedPosts() {
                    const cookies = document.cookie.split(';').map(cookie => cookie.trim());
                    const likedCookie = cookies.find(cookie => cookie.startsWith('mip_liked_posts='));
                    return likedCookie ? JSON.parse(decodeURIComponent(likedCookie.split('=')[1])) : [];
                }

                // Add likes and gallery/video indicators
                $('.mip-post-item').each(function() {
                    const post = $(this);
                    const likes = post.data('likes') || 0;
                    const postId = post.data('post-id');
                    let isLiked = false;

                    // Check if post is liked (for logged-in or non-logged-in users)
                    if (<?php echo is_user_logged_in() ? 'true' : 'false'; ?>) {
                        isLiked = false; // Placeholder, updated via AJAX
                    } else {
                        const likedPosts = getLikedPosts();
                        isLiked = likedPosts.includes(postId.toString());
                    }

                    post.append(`
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes ${isLiked ? 'liked' : ''}" data-post-id="${postId}">
                                <span class="visually-hidden">Likes:</span>
                                <i class="fas fa-heart" aria-hidden="true"></i> 
                                <span class="like-count">${likes}</span>
                            </li>
                        </ul>
                    </div>
                `);
                    if (post.data('gallery') && post.data('gallery').length > 1) {
                        post.append('<div class="gallery-item-type"><span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i></div>');
                    } else if (post.data('gallery') && post.data('gallery')[0].type === 'video') {
                        post.append('<div class="gallery-item-type"><span class="visually-hidden">Video</span><i class="fas fa-video" aria-hidden="true"></i></div>');
                    }
                });

                // Check liked posts for logged-in users
                if (<?php echo is_user_logged_in() ? 'true' : 'false'; ?>) {
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: {
                            action: 'mip_get_user_likes',
                            nonce: '<?php echo wp_create_nonce('mip_like_nonce'); ?>'
                        },
                        success: function(response) {
                            if (response.success) {
                                const likedPosts = response.data.liked_posts;
                                $('.mip-post-item').each(function() {
                                    const postId = $(this).data('post-id');
                                    if (likedPosts.includes(postId.toString())) {
                                        $(this).find('.gallery-item-likes').addClass('liked');
                                    }
                                });
                            }
                        }
                    });
                }

                // Handle like button click (only in modal)
                modalInfo.on('click', '.gallery-item-likes', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const $this = $(this);
                    const postId = $this.data('post-id');
                    const isLiked = $this.hasClass('liked');

                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: {
                            action: 'mip_like_post',
                            post_id: postId,
                            unlike: isLiked ? 1 : 0,
                            nonce: '<?php echo wp_create_nonce('mip_like_nonce'); ?>'
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update likes in modal
                                $this.find('.like-count').text(response.data.likes);
                                if (isLiked) {
                                    $this.removeClass('liked');
                                } else {
                                    $this.addClass('liked');
                                }

                                // Update likes in grid
                                const gridPost = $(`.mip-post-item[data-post-id="${postId}"]`);
                                gridPost.data('likes', response.data.likes);
                                gridPost.find('.like-count').text(response.data.likes);
                                if (isLiked) {
                                    gridPost.find('.gallery-item-likes').removeClass('liked');
                                } else {
                                    gridPost.find('.gallery-item-likes').addClass('liked');
                                }

                                // Update cookie for non-logged-in users
                                if (!<?php echo is_user_logged_in() ? 'true' : 'false'; ?>) {
                                    const likedPosts = getLikedPosts();
                                    if (isLiked) {
                                        const index = likedPosts.indexOf(postId.toString());
                                        if (index > -1) likedPosts.splice(index, 1);
                                    } else {
                                        likedPosts.push(postId.toString());
                                    }
                                    document.cookie = `mip_liked_posts=${encodeURIComponent(JSON.stringify(likedPosts))}; path=/; max-age=31536000`;
                                }
                            } else {
                                console.error('Error:', response.data.message);
                            }
                        },
                        error: function() {
                            console.error('AJAX request failed');
                        }
                    });
                });

                function populateSlider(gallery) {
                    sliderContainer.empty();
                    gallery.forEach(item => {
                        const slide = $('<div class="mip-slide"></div>');
                        if (item.type === 'video') {
                            slide.html(`<video src="${item.url}" controls playsinline></video>`);
                        } else {
                            slide.html(`<img src="${item.url}" alt="">`);
                        }
                        sliderContainer.append(slide);
                    });
                }

                function showSlide(index, instant = false) {
                    if (index < 0 || index >= currentGallery.length) return;
                    sliderContainer.css({
                        transition: instant ? 'none' : 'transform 0.4s ease',
                        transform: `translateX(${index * 100}%)`
                    });
                    currentIndex = index;
                    updateNavButtons();
                }

                function updateNavButtons() {
                    navPrev.toggleClass('hidden', currentIndex === 0 || currentGallery.length <= 1);
                    navNext.toggleClass('hidden', currentIndex >= currentGallery.length - 1 || currentGallery.length <= 1);
                }

                function openModal() {
                    body.addClass('mip-modal-open');
                    modal.addClass('visible');
                }

                function closeModal() {
                    body.removeClass('mip-modal-open');
                    modal.removeClass('visible');
                    sliderContainer.find('video').each(function() {
                        this.pause();
                    });
                }

                $('.mip-post-item').on('click', function(e) {
                    if ($(e.target).closest('.gallery-item-likes').length) return;
                    const post = $(this);
                    currentGallery = post.data('gallery') || [];
                    currentPostId = post.data('post-id');
                    const likes = post.data('likes') || 0;
                    const isLiked = post.find('.gallery-item-likes').hasClass('liked');
                    if (!currentGallery.length) return;

                    populateSlider(currentGallery);
                    modalInfo.html(`
                    <div class="mip-profile-header">
                        <img src="${post.data('profile-pic')}" alt="Profile">
                        <h3>${post.data('profile-name')}</h3>
                    </div>
                    <p>${post.data('caption').replace(/\n/g, '<br>')}</p>
                    <div class="gallery-item-likes ${isLiked ? 'liked' : ''}" data-post-id="${currentPostId}">
                        <span class="visually-hidden">Likes:</span>
                        <i class="fas fa-heart" aria-hidden="true"></i> 
                        <span class="like-count">${likes}</span>
                    </div>
                `);

                    showSlide(0, true);
                    openModal();
                });

                navNext.on('click', () => showSlide(currentIndex + 1));
                navPrev.on('click', () => showSlide(currentIndex - 1));
                modal.find('.mip-modal-close').on('click', closeModal);
                $(document).on('keyup', e => e.key === 'Escape' && closeModal());
                modal.on('click', e => e.target === modal[0] && closeModal());
            });
        </script>
<?php
    }
}
add_action('wp_footer', 'mip_output_assets');
?>