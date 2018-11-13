<?php

/*
 * Copyright (C) 2016 MarcoCantu
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
 * Description of DateFunctions
 *
 * @author MarcoCantu
 */
class DateFunctions {
    public function getSpanishLongDate($mes,$dia,$anio){
        $fechatoreturn="";
        $f_dia = mktime(0, 0,0,$mes,$dia,$anio);
        $title_month=date('F',$f_dia);
        switch ($title_month){
            case "January" : $title_month="Enero"; break;
            case "February" : $title_month="Febrero"; break;
            case "March" : $title_month="Marzo";        break;
            case "April" : $title_month="Abril";        break;
            case "May" : $title_month="Mayo";        break;
            case "June" : $title_month="Junio";        break;
            case "July" : $title_month="Julio";        break;
            case "August" : $title_month="Agosto";        break;
            case "September" : $title_month="Septiembre";        break;
            case "October" : $title_month="Octubre";        break;
            case "November" : $title_month="Noviembre";        break;
            case "December" : $title_month="Diciembre";        break;
        }

        $title_day=date('D',$f_dia);
        switch ($title_day){
            case 'Mon': $title_day="Lunes";        break;
            case 'Tue': $title_day="Martes";        break;
            case 'Wed': $title_day="Miercoles";        break;
            case 'Thu': $title_day="Jueves";        break;
            case 'Fri': $title_day="Viernes";        break;
            case 'Sat': $title_day="Sabado";        break;
            case 'Sun': $title_day="Domingo";        break;
        }
        $fechatoreturn = $title_day ." ".$dia ." de " .$title_month . " del " . $anio;
        return $fechatoreturn;
        
    }
}
