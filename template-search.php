<?php   /** Template Name: Search */ ?>
<?php get_template_part("headers/header_search"); ?>
<?php       $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));  ?>

 

<body>
    <script>
        function searchTerm(name) {
            console.log({ name });
            const product_search = document.querySelector("#product_search");
            if (product_search) {
                product_search.value = name;
            }
    }

    </script>
    <div class="search-div-product">
        <div id="search_product_">
            <form action="/search-result" method="get">
                <div class="search-div-input">
                    <i class="fas fa-search"></i>
                    <input type="text" name="product_search" id="product_search" placeholder="Search" />
                </div>
                <div class="categories-div">
                    <?php if($terms): ?>
                    <?php foreach(  $terms as $term): ?>
                        <h5 onclick="searchTerm('<?php echo $term->name ?>')"><?php echo  $term->name; ?></h5>
                        <?php endforeach; ?>
                        <?php endif; ?>

                </div>
                <button  type="submit" class="primary-button">
                    ค้นหา
                </button>
            </form>
        </div>
    </div>
</body>


