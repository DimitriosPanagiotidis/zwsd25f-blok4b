<?php

require 'database.php';

// DO NOT query the database here.
// $artworks is already coming from index.php

?>
            <section class="artworks">
                <?php
            foreach ($artworks as $artwork): ?>
                <?php $img = $artwork['image']; ?>
                <div>
                <h2><?php echo $artwork['title']; ?></h2>
                <p><?php echo "Artist: " . $artwork['artist']; ?></p>
                <p><?php echo "Year: " . $artwork['year_created']; ?></p>
                <p><?php echo "Price: $" . $artwork['price']; ?></p>
                <?php // Substr 0 dus begint vanaf het begin en -4 om de laatste 4 karakters (.jpg) te verwijderen ?>
                <a href="detailpage.php?Id=<?php echo $artwork['Id']; ?>">

            
                <?php if(file_exists(__DIR__ . '/' . substr($img, 0, -4) . "_small.jpg")): ?>
                    <img src="<?php echo substr($img, 0, -4) . "_small.jpg"; ?>" alt="<?php echo $artwork['title']; ?>" />
                <?php else: ?>
                    <img src="<?php echo  $img; ?>" alt="<?php echo $artwork['title']; ?>" />
                <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </section>
