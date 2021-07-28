<?php

namespace TYM\Core;

use DateTime;
use Exception;

class ConversionData
{

    public static function FechaHoraCompleta($unixdate)
    {
        $fecha = date("m-w", $unixdate);
        $subfecha = explode("-", $fecha);
        $dia = $subfecha[1];
        $mes = $subfecha[0];

        switch ($dia) {
            case "0":$dia_text = 'Domingo';
                break;
            case "1":$dia_text = 'Lunes';
                break;
            case "2":$dia_text = 'Martes';
                break;
            case "3":$dia_text = 'Mi&eacute;rcoles';
                break;
            case "4":$dia_text = 'Jueves';
                break;
            case "5":$dia_text = 'Viernes';
                break;
            case "6":$dia_text = 'S&aacute;bado';
                break;
        }
        switch ($mes) {
            case "1":$mes_texto = 'Enero';
                break;
            case "2":$mes_texto = 'Febrero';
                break;
            case "3":$mes_texto = 'Marzo';
                break;
            case "4":$mes_texto = 'Abril';
                break;
            case "5":$mes_texto = 'Mayo';
                break;
            case "6":$mes_texto = 'Junio';
                break;
            case "7":$mes_texto = 'Julio';
                break;
            case "8":$mes_texto = 'Agosto';
                break;
            case "9":$mes_texto = 'Septiembre';
                break;
            case "10":$mes_texto = 'Octubre';
                break;
            case "11":$mes_texto = 'Noviembre';
                break;
            case "12":$mes_texto = 'Diciembre';
                break;
        }
        return $dia_text . " " . date("d", $unixdate) . " de " . $mes_texto . " de " . date("Y", $unixdate) . " a las " . date("H:i:s", $unixdate) . "h";
    }

    public static function FechaTexto($unixdate)
    {
        $fecha = date("m-w", $unixdate);
        $subfecha = explode("-", $fecha);
        $mes = $subfecha[0];

        switch ($mes) {
            case "1":$mes_texto = 'Enero';
                break;
            case "2":$mes_texto = 'Febrero';
                break;
            case "3":$mes_texto = 'Marzo';
                break;
            case "4":$mes_texto = 'Abril';
                break;
            case "5":$mes_texto = 'Mayo';
                break;
            case "6":$mes_texto = 'Junio';
                break;
            case "7":$mes_texto = 'Julio';
                break;
            case "8":$mes_texto = 'Agosto';
                break;
            case "9":$mes_texto = 'Septiembre';
                break;
            case "10":$mes_texto = 'Octubre';
                break;
            case "11":$mes_texto = 'Noviembre';
                break;
            case "12":$mes_texto = 'Diciembre';
                break;
        }
        return date("d", $unixdate) . " de " . $mes_texto . " de " . date("Y", $unixdate);
    }

    public static function FechaBasica($unixdate)
    {
        return date("d", $unixdate) . "/" . date("m", $unixdate) . "/" . date("Y", $unixdate);
    }

    public static function FechaBasica_Input($unixdate)
    {
        return date("Y", $unixdate) . "-" . date("m", $unixdate) . "-" . date("d", $unixdate);
    }

    public static function FechaHoraBasica($unixdate)
    {
        return date("d", (int) $unixdate) . "/" . date("m", (int) $unixdate) . "/" . date("Y", (int) $unixdate) . " - " . date("H:i", (int) $unixdate);
    }

    public static function SegundosToTiempo($segundos)
    {
        $minutos = $segundos / 60;
        $horas = floor($minutos / 60);
        $minutos2 = $minutos % 60;
        $segundos_2 = $segundos % 60 % 60 % 60;
        if ($minutos2 < 10) {
            $minutos2 = '0' . $minutos2;
        }

        if ($segundos_2 < 10) {
            $segundos_2 = '0' . $segundos_2;
        }

        if ($segundos < 60) { /* segundos */
            $resultado = round($segundos) . ' Segundos';
        } elseif ($segundos > 60 && $segundos < 3600) { /* minutos */
            $resultado = $minutos2 . ':' . $segundos_2 . ' Minutos';
        } else { /* horas */
            $resultado = $horas . ':' . $minutos2 . ':' . $segundos_2 . ' Horas';
        }
        return $resultado;
    }

    public static function TiempoToSegundos($tiempo)
    {
        list($horas, $minutos, $segundos) = explode(':', $tiempo);
        return ($horas * 3600) + ($minutos * 60) + $segundos;
    }

    public static function Cambio_Formato_Fecha($fecha)
    {
        $date = new DateTime(str_replace("/", "-", $fecha));
        return $date->getTimestamp();
    }

    public static function ConvertirStringToUrl($str)
    {
        $result = mb_strtolower($str);
        $array_find = array('à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
        $array_change = array('a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
        $result = str_replace($array_find, $array_change, $result);
        $result = str_replace(" ", "-", $result);
        $result = preg_replace('/[^A-Za-z0-9\-]/', '', $result);
        return $result;
    }

    public static function ConvertPricetoWeb($price, $iva)
    {
        try {
            return number_format(round(($price * (1 + ($iva / 100))), 2, \PHP_ROUND_HALF_EVEN), 2);
        } catch (Exception $e) {
            return null;
        }

    }
}
