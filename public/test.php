<?php

$caBundlePath = 'public\assets\files\cacert.pem'; // Replace with the actual path to the CA bundle file

if (is_readable($caBundlePath)) {
    echo 'CA bundle file is accessible and readable.';
} else {
    echo 'CA bundle file is not accessible or readable.';
}