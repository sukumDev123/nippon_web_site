<?php   /** Template Name: Search */ ?>
<?php get_template_part("headers/header_search"); ?>
<?php       $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));  ?>
<?php 
$red = "";
if(isset($_GET['red'])):
$red = $_GET['red'];
endif;
$search = "";
if(isset($_GET['search'])):
$search = $_GET['search'];
endif;
$lang=get_bloginfo("language");  
$text_words = [
    "th" => [
        "search" => "ค้นหา"
    ],
    "en" => [
        "search" => "Search"
    ]
][$lang];
?>
 <style>
     body {
        margin-top: 0px !important;
        padding-top: 0px !important;
     }
     .fa-times  {
         position: absolute;
         right:30px;
         top: 30px;
         font-size: 30px;
         cursor: pointer;
     }
    
 </style>

<body>
  
    <i id="cancelled"  class="fa fa-times"></i>
    <div class="search-div-product">
        <div id="search_product_">
            <form action="/nippon/search-result" method="get">
                <div class="search-div-input">
                    <i class="bi bi-search"></i>
                    <input type="text" name="product_search" id="product_search" placeholder="Search" value="<?php echo $search ?>" />
                </div>
                <div class="categories-div">
                    <?php if($terms): ?>
                    <?php foreach(  $terms as $term): ?>
                        <h5 onclick="searchTerm('<?php echo $term->name ?>')"><?php echo  $term->name; ?></h5>
                        <?php endforeach; ?>
                        <?php endif; ?>

                </div>
                <button  type="submit" class="primary-button">
                    <?php echo $text_words['search'] ?>
                </button>
            </form>
        </div>
    </div>
</body>

<script>
        function searchTerm(name) {
            
            const product_search = document.querySelector("#product_search");
            if (product_search) {
                product_search.value = name;
            }
        }
        const cancelled = document.querySelector("#cancelled");
        console.log({cancelled})
        if(cancelled) {
            cancelled.addEventListener("click" , event => {
               if( localStorage.getItem("link_now"))  window.location.href =     localStorage.getItem("link_now");
            })
        }

    </script>


