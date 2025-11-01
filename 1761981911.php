<?php
/*=============================================================================
 * 此加密算法，是密码文本的加密算法，输入明文密码，输出密文密码。
 * 选择明文攻击（Chosen Plaintext Attack，CPA)
 * 定义：选择明文攻击(CPA)是指攻击者除了知道加密算法外，还可以选定明文消息，从而得到加密后的密文，即知道选择的明文和加密的密文，但是不能直接攻破密钥。
 * 简单理解：知道明文和密文以及加密算法，目标为推出密钥和解密算法，解密flag。
 * 密文flag: EAwWHhJWWQJbVkMfVEoNVgxgWk8JWBBLDAROGUhSXGBfX00ZU1MMUQwb
 * ===========================================================================
 */

function encrypt() {
	$plaintext = "jdncvedlkbtbeazhuwbxfazdk";
    $ciphertext = "";
    $key = "1";
    $sr = rand();
    for ($i = 0; $i < strlen($plaintext); $i++) {
        $ciphertext .= chr(((ord($plaintext[$i]) & (~ord($plaintext[$i]) | ~ord($key[$i % strlen($key)]))) | ( ord($key[$i % strlen($key)]) & (~ord($plaintext[$i]) | ~ord($key[$i % strlen($key)])))) + (($sr * ($sr + 1) % 2) + 1));
    }
    //echo bin2hex($ciphertext);
    return base64_encode($ciphertext);
}
echo encrypt();
?>