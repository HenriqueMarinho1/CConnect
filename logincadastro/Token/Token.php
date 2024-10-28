<?php

function tokenPrefix($string, $prefix) {
    $resultado = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $resultado .= $prefix . $string[$i];
    }
    return $resultado;
}

function tokenHash($tk){
    if (isset($tk) && !empty($tk)) {
        $token = $tk;

        $md5 = md5($token);
        $sha1 = sha1($token);

        $md5_part1 = substr($md5, 0, 16);
        $md5_part2 = substr($md5, 16, 32);

        $sha1_part1 = substr($sha1, 0, 20);
        $sha1_part2 = substr($sha1, 20, 40);

        $token1 = sha1($md5_part1.$sha1_part2.$md5_part2.$sha1_part1);
        $token2 = md5($md5_part2.$sha1_part1.$md5_part1.$sha1_part2);
        $token3 = sha1($md5_part1.$sha1_part1.$md5_part1.$sha1_part2);
        $token4 = md5($md5_part2.$sha1_part1.$md5_part1.$sha1_part2);
        $token5 = sha1($md5_part1.$sha1_part1.$md5_part2.$sha1_part2);
        $token6 = md5($md5_part2.$sha1_part2.$md5_part1.$sha1_part1.$md5_part2);

        $t1 = tokenPrefix($token1, '0x10x3A7F');
        $t2 = tokenPrefix($token2, '0x20xFF12');
        $t3 = tokenPrefix($token3, '0x30x8D4A');
        $t4 = tokenPrefix($token4, '0x40xABE9');
        $t5 = tokenPrefix($token5, '0x50x67C5');
        $t6 = tokenPrefix($token6, '0x60xD0F8');

        $md5_result =  tokenPrefix(md5($t2.$t1.$t4.$t3.$t5.$t6), '0x0');
        $hash = md5(hash('sha256', $md5_result));
        return $hash;
    }else{
        return 'token_empty';
    }

}