<?php

    $ID = (int)$_GET['type'];

    include(__DIR__ . '/../env.php'); // Environment file

    $conn = new mysqli($DB_Addr, $DB_User, $DB_Pass, $DB_DB);

    if($conn->connect_error) {
        header('Location: /500');
        die();
    }


    if ($ID != 0){
        $prjsInClass = $conn->query('SELECT * FROM prj_type_link WHERE Class_ID='.$ID);

        if($prjsInClass == false) {
            header('Location: /500');
            die();
        };

        $prjs = array();
        while($p=$prjsInClass->fetch_assoc()){
            $prjs[] = $p['Proj_ID'];
        }

        $prjList = $conn->query('SELECT * FROM projects WHERE ID IN (' . implode(',', $prjs) . ')');
    }else{
        $prjList = $conn->query('SELECT * FROM projects');
    };

    if($prjList == false) {
        header('Location: /400');
        die();
    };
?>

<img id="backimg" src="resources/img/back1.jpg" alt=""/>

<!--
<div class="prj-container">
    <h1>A* Pathfinding <a href="https://github.com/Lewis98" class="float-right">View on Github: <img src="resources/img/GitHub-Mark-Light-64px.png" alt="Github link"></a></h1>
    <br>
    <img src="https://via.placeholder.com/300" class="float-right prj-timg" alt="thumbnail">
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor risus vitae nisl lacinia volutpat. Duis nec sem magna. Donec eros urna, tincidunt sit amet neque ut, laoreet 
    lobortis nisi. In in urna nisi. Suspendisse tristique leo ante, sit amet finibus ipsum placerat quis. Etiam varius fermentum diam at aliquet. Nam interdum arcu a turpis sollicitudin 
    elementum. In magna velit, laoreet at sapien id, congue ornare nisi. Nunc nec mauris convallis, vestibulum quam in, ultrices ante. Duis vel eros a enim vestibulum ultrices nec eu eros. 
    Morbi id ornare eros. Nam fringilla mauris et tortor scelerisque malesuada. Vestibulum aliquet, tellus eu lobortis convallis, leo risus fringilla nibh, ut accumsan ante diam in enim. 
    Donec at mi et mi aliquam facilisis sed et nulla. Praesent eget ipsum id dui consequat congue sit amet eu risus. Vivamus vel enim congue, sodales sem sit amet, molestie eros. Ut blandit 
    ultrices lorem quis vestibulum. Donec euismod ipsum quis ipsum eleifend vestibulum. Nulla ac elit lectus. Nam lacus quam, efficitur at malesuada sed, imperdiet eget orci. 
    Aliquam varius nulla vitae lectus ornare posuere. Fusce at molestie elit, quis rutrum nulla. Donec sollicitudin in nisl vitae tempus. Fusce pellentesque sagittis fermentum. 
    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque egestas placerat massa sit amet tempor. Maecenas maximus neque quis suscipit eleifend. 
    Aenean elementum sapien sed nisl venenatis porttitor. Etiam a enim egestas velit faucibus luctus vel et elit. In hac habitasse platea dictumst. Cras placerat vestibulum nibh, 
    eu pellentesque orci hendrerit vel. Sed vel ipsum scelerisque, venenatis dolor quis, maximus risus. Phasellus metus neque, finibus in odio eget, dignissim auctor mauris. 
    Mauris ultrices lectus id luctus mattis.
    </p>
</div>
-->

<?php
    
    while($prj=$prjList->fetch_assoc()){
        echo '<div class="prj-container">';
        echo '<h1>'.$prj['Title'].' <a href="'.$prj['GitLink'].'" class="prj-git-link float-right">View on Github: <img src="resources/img/GitHub-Mark-Light-64px.png" alt="Github link"></a></h1>';
        echo '<br>';
        echo '<img src="resources/img/projectList/'.$prj['ImgPath'].'" class="float-right prj-timg" alt="thumbnail">';
        echo '<p>'.$prj['Description'].'</p>';
        echo '</div>';
    }

?>