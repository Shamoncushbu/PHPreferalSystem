<?php

include 'share.php';

$share = new Share();

/*
 * calculate the amount of each parent you should call this after user registration
 * params $userId
 * $amount
 */
$share->calculateShare(2,100);

/*
 * Add referals
 */