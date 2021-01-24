<?php

    include(__DIR__ . '/../env.php'); // Environment file

    $conn = new mysqli($DB_Addr, $DB_User, $DB_Pass, $DB_DB);

    if($conn->connect_error) {
        header('Location: /500');
        die();
    };

    $rows = $conn->query("SELECT * FROM classes");

    
    if($rows == false) {
        header('Location: /500');
        die();
    };

?>


<img id="backimg" src="resources/img/back1.jpg" alt=""/>

<div class="pr_flexCont">

    <div class="pr_backlight">        
        <a class="pr_group_link" href="/PrjList?type=0">
            <div class="pr_group">
            <img src="resources/img/projects/universal-set.png" alt="placeholder">
            <h2>All Projects</h2>
            <p>See all projects <br><br></p>
            </div>
        </a>   
    </div>

    <?php

        $i = 1;
        while($row=$rows->fetch_assoc()){

            $i++;

            echo '<div class="pr_backlight">';
            echo '  <a class="pr_group_link" href="/PrjList?type='.$row['ID'].'">';
            echo '      <div class="pr_group">';
            echo '          <img src="resources/img/projects/'.$row['ImgLink'].'" alt="">';
            echo '          <h2>'.$row['DispName'].'</h2>';
            echo '          <p>'.$row['Description'].'</p>';
            echo '      </div>';
            echo '  </a>';
            echo '</div>';

            if($i % 3 ==0){
                echo '<div class="flex_break"></div>';
            };

        };
    ?>


</div>