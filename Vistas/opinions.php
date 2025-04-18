<main selected_sp>
    <intro>
        <h1>Opinions</h1>
        <p>Deciding what are you going to read with the incredible amount of stories there are is quite hard, so usually you end up with 2 options. You start skimming synopsis or reading the first chapters to see if you will like them; or/and see reviews or simple opinions of people to see if the story is any good. This becomes quite tedious, and I feel like it is not going anywhere, but I will try to make it less of a pain by making more accessible opinions that talk more about the story without spoiling, just trying to transmit what you need to expect of the story.</p>
    </intro>
    <hr>
    <content>
        <?php
            include "./Partes/Aside.php";

            if(isset($_GET['section'])){
                if($_GET['section'] != "manga")
                    include "./Partes/Opinions_manhwa.php";
    
                if($_GET['section'] != "manwha")
                    include "./Partes/Opinions_manga.php";
            }else{
                include "./Partes/Opinions_manhwa.php";
                include "./Partes/Opinions_manga.php";
            }
        ?>
    </content>
</main>