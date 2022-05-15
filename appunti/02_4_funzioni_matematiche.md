# FUNZIONI MATEMATICHE

* `number abs ( mixed numero )`
Restituisce il valore assoluto di un numero.

* `mixed max ( number arg1, number arg2 [, number ...] )`

* `mixed max ( array numbers [, array ...] )`

* `max() `
restituisce il numericamente più grande dei valori dati come parametro.

* `mixed min ( number arg1, number arg2 [, number ...] )`

* `mixed min ( array numbers [, array ...] )`

* `min() restituisce il numericamente più piccolo dei valori dati come parametro.`

* `float pow ( float base, float esp )`

Restituisce base elevato alla potenza di esp. Se possibile, questa funzione restituisce un integer.
Nota: Il PHP non può gestire valori negativi per bases.

* `int rand ( [int min, int max] )`

Se chiamata senza i parametri opzionali min, max, rand() restituisce un valore pseudo casuale
compreso fra 0 e RAND_MAX. Se ad esempio si desidera un numero casuale compreso fra 5 e 15
(inclusi) usare rand (5, 15).

* `double round ( double val [, int precisione] )`
Restituisce il valore arrotondato di val con la precisione specificata (numero di cifre dopo il punto
decimale). precisione può anche essere negativa o zero (predefinito).

---

## Elenco funzioni


* [abs() "Returns the absolute value of a number"](http://php.net/manual/en/function.abs.php) 
* [acos() "Returns the arccosine of a number"](http://php.net/manual/en/function.acos.php) 
* [acosh() "Returns the inverse hyperbolic cosine of a number "](http://php.net/manual/en/function.acosh.php) 
* [asin() "Returns the arcsine of a number"](http://php.net/manual/en/function.asin.php) 
* [asinh() "Returns the inverse hyperbolic sine of a number"](http://php.net/manual/en/function.asinh.php) 
* [atan() "Returns the arctangent of a number as a numeric value between -PI/2 and PI/2 radians"](http://php.net/manual/en/function.atan.php) 
* [atan2() "Returns the angle theta of an (x,y) point as a numeric value between -PI and PI radians"](http://php.net/manual/en/function.atan2.php) 
* [atanh() "Returns the inverse hyperbolic tangent of a number"](http://php.net/manual/en/function.atanh.php) 
* [base_convert() "Converts a number from one base to another"](http://php.net/manual/en/function.base-convert.php) 
* [bindec() "Converts a binary number to a decimal number"](http://php.net/manual/en/function.bindec.php) 
* [ceil() "Returns the value of a number rounded upwards to the nearest integer"](http://php.net/manual/en/function.ceil.php) 
* [cos() "Returns the cosine of a number"](http://php.net/manual/en/function.cos.php) 
* [cosh() "Returns the hyperbolic cosine of a number"](http://php.net/manual/en/function.cosh.php) 
* [decbin() "Converts a decimal number to a binary number"](http://php.net/manual/en/function.decbin.php) 
* [dechex() "Converts a decimal number to a hexadecimal number"](http://php.net/manual/en/function.dechex.php) 
* [decoct() "Converts a decimal number to an octal number"](http://php.net/manual/en/function.decoct.php) 
* [deg2rad() "Converts a degree to a radian number"](http://php.net/manual/en/function.deg2rad.php) 
* [exp() "Returns the value of E"](http://php.net/manual/en/function.exp.php) 
* [expm1() "Returns the value of E"](http://php.net/manual/en/function.expm1.php) 
* [floor() "Returns the value of a number rounded downwards to the nearest integer"](http://php.net/manual/en/function.floor.php) 
* [fmod() "Returns the remainder (modulo) of the division of the arguments"](http://php.net/manual/en/function.fmod.php) 
* [getrandmax() "Returns the maximum random number that can be returned by a call to the rand() function"](http://php.net/manual/en/function.rand.php)
* [hexdec() "Converts a hexadecimal number to a decimal number"](http://php.net/manual/en/function.hexdec.php) 
* [hypot() "Returns the length of the hypotenuse of a right-angle triangle"](http://php.net/manual/en/function.hypot.php) 
* [is_finite() "Returns true if a value is a finite number"](http://php.net/manual/en/function.is-finite.php) 
* [is_infinite() "Returns true if a value is an infinite number"](http://php.net/manual/en/function.is-infinite.php) 
* [is_nan() "Returns true if a value is not a number"](http://php.net/manual/en/function.is-nan.php) 
* [lcg_value() "Returns a pseudo random number in the range of (0,1)>](http://php.net/manual/en/function.lcg-value.php) 
* [log() "Returns the natural logarithm (base E) of a number"](http://php.net/manual/en/function.log.php) 
* [log10() "Returns the base-10 logarithm of a number"](http://php.net/manual/en/function.log10.php) 
* [log1p() "Returns log(1+number)>](http://php.net/manual/en/function.log.php) 
* [max() "Returns the number with the highest value of two specified numbers"](http://php.net/manual/en/function.max.php) 
* [min() "Returns the number with the lowest value of two specified numbers"](http://php.net/manual/en/function.min.php) 
* [mt_getrandmax() "Returns the largest possible value that can be returned by mt_rand(>](http://php.net/manual/en/function.mt-rand.php) 
* [mt_rand() "Returns a random integer using Mersenne Twister algorithm"](http://php.net/manual/en/function.mt-rand.php) 
* [mt_srand() "Seeds the Mersenne Twister random number generator"](http://php.net/manual/en/function.mt-srand.php) 
* [octdec() "Converts an octal number to a decimal number"](http://php.net/manual/en/function.octdec.php) 
* [pi() "Returns the value of PI"](http://php.net/manual/en/function.pi.php) 
* [pow() "Returns the value of x to the power of y"](http://php.net/manual/en/function.pow.php) 
* [rad2deg() "Converts a radian number to a degree"](http://php.net/manual/en/function.rad2deg.php) 
* [rand() "Returns a random integer"](http://php.net/manual/en/function.rand.php) 
* [round() "Rounds a number to the nearest integer"](http://php.net/manual/en/function.round.php) 
* [sin() "Returns the sine of a number"](http://php.net/manual/en/function.sin.php) 
* [sinh() "Returns the hyperbolic sine of a number"](http://php.net/manual/en/function.sinh.php) 
* [sqrt() "Returns the square root of a number"](http://php.net/manual/en/function.sqrt.php) 
* [srand() "Seeds the random number generator"](http://php.net/manual/en/function.srand.php) 
* [tan() "Returns the tangent of an angle"](http://php.net/manual/en/function.tan.php) 
* [tanh() "Returns the hyperbolic tangent of an angle"](http://php.net/manual/en/function.tanh.php) 