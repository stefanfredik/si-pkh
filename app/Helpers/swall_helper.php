<?php

function setSwall($msg, $status = 'success',) {
    $res = [
        'status' => $status,
        'msg'   => $msg,
    ];

    return session()->setFlashdata('swall', $res);
}
