<?php

include 'share.php';

$share = new Share();

/*
 * calculate the amount of each parent you should call this after adding referee
 * params $userId userid of the user
 * $amount Amount to calculated
 */
$share->calculateShare(2,100);

/*
 * Add referals for a particular user
 * Params Array [$parentId,$userId]
 * $parentId  userId of user who is refering someone else
 * $userId   $userId of person being refered
 */

$share->addReferals([1,5]);

/*
 * Get the total referal amount of each user
 * params $userId  userId of the registerd user
 * Returns total amount
 */

$amount = $share->getAmount(1);
