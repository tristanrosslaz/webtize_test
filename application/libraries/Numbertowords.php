<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Numbertowords {
    function convert_number($amounttoconvert) 
    {   

        list($whole, $decimal) = explode('.', number_format($amounttoconvert,2,".",""));


        $number=$whole;

        if (($number < 0) || ($number > 999999999)) 
        { 
            throw new Exception("Number is out of range");
        } 

        $Gn = floor($number / 1000000);  /* Millions (giga) */ 
        $number -= $Gn * 1000000; 
        $kn = floor($number / 1000);     /* Thousands (kilo) */ 
        $number -= $kn * 1000; 
        $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
        $number -= $Hn * 100; 
        $Dn = floor($number / 10);       /* Tens (deca) */ 
        $n = $number % 10;   
        /* Ones */ 
        $res = ""; 
        if ($Gn)
        {
            $res .= $this->convert_number_whole(number_format($Gn,2,".",",")) . " Million";
        }
        if ($kn)
        {
            $res .= (empty($res) ? "" : " ") .
                $this->convert_number_whole(number_format($kn,2,".",",")) . " Thousand";
        }
        if ($Hn)
        {
            $res .= (empty($res) ? "" : " ") .
                $this->convert_number_whole(number_format($Hn,2,".",",")) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
            "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
            "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", 
            "Nineteen"); 
        $tens = array("", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", 
            "Seventy", "Eighty", "Ninety"); 

        if ($Dn || $n)
        {
            if (!empty($res))
            {
                $res .= " ";
            }

            if ($Dn < 2)
            {
                $res .= $ones[$Dn * 10 + $n];
            }
            else
            {
                $res .= $tens[$Dn];

                if ($n)
                {
                    $res .= "-" . $ones[$n];
                }
            }
        }

        if (empty($res)) 
        { 
            $res = "zero"; 
        }

        $decimalnew = str_replace("0","",$decimal);
       //print_r($decimal."-".$decimalnew);die();
        //echo ("-".$decimal."-".$decimalnew."-");die();
        if($decimal===$decimalnew)
        {
            if($decimal<10)
            {
                $decimal=$decimalnew."0";
            }

        }
        else
        {
            $decimal=$decimal;
        }

        if($decimal>0)
        {
            if($decimal<10)
            {
                $decimal=$decimalnew;
            }

            return $res." AND ".$decimal."/100";
        }
        else
        {
            return $res;
        }

    } 



    function convert_number_whole($amounttoconvert) 
    {   

        list($whole, $decimal) = explode('.', $amounttoconvert);


        $number=$whole;

        if (($number < 0) || ($number > 999999999)) 
        { 
            throw new Exception("Number is out of range");
        } 

        $Gn = floor($number / 1000000);  /* Millions (giga) */ 
        $number -= $Gn * 1000000; 
        $kn = floor($number / 1000);     /* Thousands (kilo) */ 
        $number -= $kn * 1000; 
        $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
        $number -= $Hn * 100; 
        $Dn = floor($number / 10);       /* Tens (deca) */ 
        $n = $number % 10;   
        /* Ones */ 
        $res = ""; 
        if ($Gn)
        {
            $res .= $this->convert_number_whole(number_format($Gn,2,".",",")) . " Million";
        }
        if ($kn)
        {
            $res .= (empty($res) ? "" : " ") .
                $this->convert_number_whole(number_format($kn,2,".",",")) . " Thousand";
        }
        if ($Hn)
        {
            $res .= (empty($res) ? "" : " ") .
                $this->convert_number_whole(number_format($Hn,2,".",",")) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
            "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
            "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", 
            "Nineteen"); 
        $tens = array("", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", 
            "Seventy", "Eighty", "Ninety"); 

        if ($Dn || $n)
        {
            if (!empty($res))
            {
                $res .= " ";
            }

            if ($Dn < 2)
            {
                $res .= $ones[$Dn * 10 + $n];
            }
            else
            {
                $res .= $tens[$Dn];

                if ($n)
                {
                    $res .= "-" . $ones[$n];
                }
            }
        }

        if (empty($res)) 
        { 
            $res = "zero"; 
        }

        return $res;
    } 
}

?>