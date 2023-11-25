<meta name="csrf-token" content="{{ csrf_token() }}">
<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Our Yummy Menu</h2>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            @foreach($categories as $category)
                <li class="nav-item{{ $loop->first ? ' active' : '' }}">
                    <a class="nav-link{{ $loop->first ? ' active-category' : '' }}" data-bs-toggle="tab" data-bs-target="#menu-{{ $category->id }}" onclick="loadProducts({{ $category->id }})">
                        <span class="category-name">{{ $category->name }}</span>
                    </a>
                </li><!-- End tab nav item -->
            @endforeach
        </ul>

        <!-- Display the products for the selected category -->
        <div class="tab-content">
        @foreach($categories as $category)
            <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}" id="menu-{{ $category->id }}">
                <h3 id="category-heading-{{ $category->id }}">
                    <input type="hidden" id="category-name-{{ $category->id }}" value="">
                </h3>
                <ul id="products-{{ $category->id }}" style="display: none;">
                    <!-- Products will be dynamically populated here -->
                </ul>
            </div><!-- End tab pane -->
        @endforeach
        </div>

    </div>
</section><!-- End Menu Section -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        
        // Show the first category's product list on page load
        loadProducts({{ $categories->first()->id }});

        // Color the active tab in nav
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active-category');
            $(this).addClass('active-category');
        });
    });

    function loadProducts(id) {
        // Fetch category name
        $.ajax({
            url: '/manager/categories/' + id + '/name',
            method: 'GET',
            success: function(response) {
                var categoryName = response.name;

                // Hide the product list elements of all categories
                $('.tab-pane ul').hide();
                $('#category-heading-' + id).hide();

                // Retrieve products for the selected category
                $.ajax({
                    url: '/manager/categories/' + id + '/products',
                    type: 'GET',
                    success: function(response) {
                    // Update the product list for the selected category
                    var productList = $('#products-' + id);
                    productList.empty();
                    
                    var row = $('<div class="row gy-5"></div>');
                    var count = 0;
                    
                    $.each(response, function(index, product) {
                        var productItem = $('<div class="col-lg-4 menu-item pt-4 "></div>');
                        var link = $('<a></a>').attr('href', product.image).addClass('glightbox');
                        var image = $('<img>').attr('src', product.image).addClass('menu-img img-fluid');
                        var name = $('<h4></h4>').text(product.name);
                        var price = $('<p class="price"></p>').text('Rs ' + product.price);
                        var button = $('<button></button>').text('Add to list').addClass('add-to-list-btn').attr('onclick', "addToBill('" + product.name + "', " + product.price + ")");
                        
                        link.append(image);
                        productItem.append(link, name, price, button);
                        row.append(productItem);
                        
                        count++;
                        if (count === 3) {
                            productList.append(row);
                            row = $('<div class="row gy-5"></div>');
                            count = 0;
                        }
                    });

                        if (count > 0) {
                            productList.append(row);
                        }

                        // Show the product list and update the active class for the category links
                        $('.tab-pane').removeClass('show active');
                        productList.show();
                        $('.nav-link').removeClass('active show');
                        $('#menu-' + id).addClass('active show');

                        // Update the category name and show it
                      $('#category-heading-' + id).html('<div class="tab-header text-center"><h3>' + categoryName + '</h3></div>').show();

                    },
                    error: function(xhr) {
                        // Handle error response
                        console.log(xhr.responseText);
                    }
                });
            },
            error: function() {
                console.error('Failed to retrieve category name.');
            }
        });
    }
</script>
