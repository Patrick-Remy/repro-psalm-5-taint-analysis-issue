<?php

/**
 * @psalm-taint-sink sql $sql
 */
function execSql($sql) {
}

execSql($bad_data);
