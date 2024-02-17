jQuery(document).ready(function ($) {
    $('#custom-filter-buttons').on('click', '.custom-filter-button', function () {
        var selectedState = $(this).data('custom');

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_locations',
                state: selectedState,
            },
            success: function (response) {
                $('#locations-container').html(response.data);
            },
            error: function () {
                console.log('Error occurred during AJAX request.');
            },
        });
    });
});

jQuery(document).ready(function ($) {
    function loadFilteredBlogPosts(categoryId) {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'load_filtered_blog_posts',
                category_id: categoryId,
            },
            success: function (response) {
                $('#blog-posts-container').html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }

    function initSlickSlider() {
        if ($(window).width() < 768) {
            $('#categorySlider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: true,
                prevArrow:"<button type='button' class='slick-prev pull-left'><img src='/wp-content/themes/cardinalthemev2/assets/arrow-1.png' alt='Previous Arrow' /></button>",
                nextArrow:"<button type='button' class='slick-next pull-right'><img src='/wp-content/themes/cardinalthemev2/assets/arrow-gray.png' alt='Next Arrow' /></button>",        
                adaptiveHeight: true,
            }).on('afterChange', function (event, slick, currentSlide) {
               var categoryId = $('#categorySlider .slick-current button').data('custom');
               $('.custom-filter-button').removeClass('active');
               $('.custom-filter-button[data-custom="' + categoryId + '"]').addClass('active').trigger('click');
           });
        }
    }

    $(document).on('click', '.custom-filter-button', function () {
        var categoryId = $(this).data('custom');
        loadFilteredBlogPosts(categoryId);
    });

    initSlickSlider();

    $(window).resize(function () {
        if ($(window).width() < 768) {
            $('#categorySlider').slick('unslick');
            initSlickSlider();
        } else {
            $('#categorySlider').slick('unslick');
        }
    });
});

jQuery(document).ready(function ($) {
    var currentPage = 1;
    var postsPerPage = 5; // Change this value to adjust the number of posts per page
    var selectedCategory = ''; // Initialize the selected category to an empty string

    // Function to fetch the total number of posts for a specific category
    function getTotalPostsCount(category) {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'get_total_posts_count',
                category: category // Pass the selected category to the server
            },
            success: function (response) {
                var totalPosts = parseInt(response);
                generatePagination(totalPosts);
                loadBlogPosts(currentPage, selectedCategory); // Pass the selected category to load blog posts
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }

    // Function to fetch and display blog posts based on page number and category
    function loadBlogPosts(pageNumber, category) {
        pageNumber = parseInt(pageNumber, 10); // Ensure it's an integer
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'load_blog_posts_pagination',
                page_number: pageNumber,
                posts_per_page: postsPerPage,
                category: category // Pass the selected category to the server
            },
            success: function (response) {
                $('#blog-posts-container').html(response);
                updatePagination(pageNumber); // Update active page based on loaded posts
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }

    // Function to update the active page link in the pagination
    function updatePagination(pageNumber) {
        $('.pagination-pages .page-number').removeClass('active');
        $('.pagination-pages .page-number').eq(pageNumber - 1).addClass('active');
    }

    // Function to generate pagination indicators
    function generatePagination(totalPosts) {
        var totalPages = Math.ceil(totalPosts / postsPerPage);

        var paginationHTML = '';
        for (var i = 1; i <= totalPages; i++) {
            paginationHTML += '<span class="page-number">' + i + '</span>';
        }

        $('.pagination-pages').html(paginationHTML);
        $('.pagination-pages .page-number').eq(currentPage - 1).addClass('active');
    }

    // Initial load of blog posts and pagination for all categories
    getTotalPostsCount(selectedCategory);
    // Handle category filter button click event
    $('.custom-filter-button').on('click', function () {
        var category = $(this).data('custom');
        selectedCategory = category;
        currentPage = 1; // Reset to the first page when changing category
        getTotalPostsCount(selectedCategory);
    });

    // Handle pagination click event
    $(document).on('click', '.pagination-pages .page-number', function () {
        currentPage = parseInt($(this).text());
        loadBlogPosts(currentPage, selectedCategory); // Pass the selected category to load blog posts
    });

    // Handle previous page arrow click event
    $(document).on('click', '.prev-page', function () {
        if (currentPage > 1) {
            currentPage--;
            loadBlogPosts(currentPage, selectedCategory); // Pass the selected category to load blog posts
        }
    });

    // Handle next page arrow click event
    $(document).on('click', '.next-page', function () {
        var totalPages = $('.pagination-pages .page-number').length;
        if (currentPage < totalPages) {
            currentPage++;
            loadBlogPosts(currentPage, selectedCategory); // Pass the selected category to load blog posts
        }
    });
});


// jQuery(document).ready(function($) {
//     var calendarContainer = $('.tribe-events-calendar-month');

//     $('.event-category-button').on('click', function() {
//         var selectedCategory = $(this).data('category');

//         $('.event-category-button').removeClass('active');
//         $(this).addClass('active');

//         $.ajax({
//             url: ajax_object.ajax_url,
//             type: 'POST',
//             data: {
//                 action: 'custom_event_category_filter',
//                 category: selectedCategory,
//             },
//             beforeSend: function() {
//                 // Add loading indicator if needed
//             },
//             success: function(response) {
//                 // Update the calendar container with the filtered events HTML
//                 calendarContainer.html(response.data);

//                 // Reinitialize The Events Calendar JS after updating the content
//                 if (window.tribe) {
//                     window.tribe.events.list.init();
//                 }
//             },
//             error: function(error) {
//                 console.log(error);
//             }
//         });
//     });
// });
