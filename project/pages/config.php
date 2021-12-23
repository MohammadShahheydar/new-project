<?php
    function getConnection () {
        return mysqli_connect("localhost" , 'root' , 'Mohamm@d' , 'laitec-practice-5') or die ('can not connect to db');
    }
    
    function getSlider($column = "*" , $condition = "") {
        $query = "select $column from slider where $condition";
        return mysqli_query(getConnection() , $query);
    }
