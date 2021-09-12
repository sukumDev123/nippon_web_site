

<?php 



$classTitle = "";
if(isset($args["class_title"])) {
    $classTitle  = $args['class_title'];
}
?>
<div class="corporate-value-content">
    <?php foreach($args["cards"] as $card): ?>
        <div class="card-corporate">
                <div class="content-corporate">
                        <img src="<?php echo $card['image'] ?>" alt="<?php echo $card['title'] ?>">
                        <h1 class="title <?php echo $classTitle ?>"><?php echo $card['title'] ?> </h1>
                        <p class="detail"><?php echo $card['detail'] ?></p>
                </div>
        </div>
    <?php endforeach; ?>
</div>
<?php ?>