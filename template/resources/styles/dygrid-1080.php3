<?php

$prefix    = "gs1080";
$w_gutter  = 15; // px.
$w_column  = 15; // px.
$w_gap     = 30; // px.
$w_padding = 20; // px.
$n_columns = 24;

include( "dygrid/dygrid-base.php3" );

dygrid( $prefix, $w_gutter, $w_column, $w_gap, $w_padding, $n_columns );

