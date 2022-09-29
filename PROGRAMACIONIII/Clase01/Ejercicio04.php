<?php
// Ejercicio 04 Martin Gonzalez
/*Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.*/ 


$op1 = 4;
$op2 = 2;
$resultado = 0;

$operador = '*';

    switch($operador){
        case '+':
            $resultado = $op1 + $op2;
           
            echo "El resultado es: $resultado";
            break;
         case '-':   
            $resultado = $op1 - $op2;
           
            echo "El resultado es: $resultado";
            break;
        case '/':   
            $resultado =  $op1 / $op2;
           
            echo "El resultado es: $resultado";
            break;
        case '*':   
            $resultado = $op1 * $op2;
            echo "El resultado es: $resultado";
            break;
    }





?>