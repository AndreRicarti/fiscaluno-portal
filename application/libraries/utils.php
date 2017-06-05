<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Classe Utils para usar no projeto
 *
 * @function validarInn($inn), validarCnpj($cnpj), validarCpf($cpf),
 * generateRandomString($length), generateMD5String($str), generateSHA1String($str),
 * verificaCpfCnpj(), formataCpfCnpj();
 *
 * @author   Son182
 * @access   public
 */
class Utils
{

    function validarInn($inn)
    {
        $inn = preg_replace('/[^0-9]/', '', (string)$inn);

        if (strlen($inn) == 14)
            return $this->validarCnpj($inn);
        else if (strlen($inn) == 11)
            return $this->validarCpf($inn);
        else
            return false;
    }

    function validarCnpj($cnpj)
    {
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    function validarCpf($cpf)
    {
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }

    function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function generateMD5String($str)
    {
        $strMD5 = strtoupper(md5($str));
        return $strMD5;
    }

    function generateSHA1String($str)
    {
        $strSHA1 = sha1($str);
        return $strSHA1;
    }

    /**
     * Verifica se é CPF ou CNPJ
     *
     * Se for CPF tem 11 caracteres, CNPJ tem 14
     *
     * @access protected
     * @param string CPF, CNPJ
     * @return string CPF, CNPJ ou false
     */
    protected function verificaCpfCnpj($value)
    {
        // Deixa apenas números no valor
        $value = preg_replace('/[^0-9]/', '', $value);

        // Garante que o valor é uma string
        $value = (string)$value;

        // Verifica CPF
        if (strlen($value) === 11) {
            return 'CPF';
        } // Verifica CNPJ
        elseif (strlen($value) === 14) {
            return 'CNPJ';
        } // Não retorna nada
        else {
            return false;
        }
    }

    /**
     * Formata CPF ou CNPJ
     *
     * @access public
     * @param string CPF, CNPJ
     * @return string  CPF ou CNPJ formatado
     */
    public function formataCpfCnpj($value)
    {
        // O valor formatado
        $formatado = false;

        // Valida CPF
        if ($this->verificaCpfCnpj($value) === 'CPF') {
            // Formata o CPF ###.###.###-##
            $formatado = substr($value, 0, 3) . '.';
            $formatado .= substr($value, 3, 3) . '.';
            $formatado .= substr($value, 6, 3) . '-';
            $formatado .= substr($value, 9, 2) . '';

        } // Valida CNPJ
        elseif ($this->verificaCpfCnpj($value) === 'CNPJ') {
            // Formata o CNPJ ##.###.###/####-##
            $formatado = substr($value, 0, 2) . '.';
            $formatado .= substr($value, 2, 3) . '.';
            $formatado .= substr($value, 5, 3) . '/';
            $formatado .= substr($value, 8, 4) . '-';
            $formatado .= substr($value, 12, 14) . '';
        }
        // Retorna o valor
        return $formatado;
    }

    /**
     * Formata o CEP
     *
     * @access public
     * @param $cep
     * @return bool|string
     */
    public function formataCep($cep){
        // Deixa apenas números no valor
        $cep = preg_replace('/[^0-9]/', '', $cep);

        // Garante que o valor é uma string
        $cep = (string)$cep;

        // O valor formatado
        $cepFormatado = false;

        // Verifica se o tamanho do $cep é 8
        if (strlen($cep) == 8){
            // Formata o CEP #####-###
            $cepFormatado = substr($cep, 0, 5) . '-';
            $cepFormatado .= substr($cep, 5, 3);
        }

        //Retorna o valor
        return $cepFormatado;
    }
}