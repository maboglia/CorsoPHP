Dichiarazioni di variabili
--------------------------

A volte, gli sviluppatori cercano di rendere il loro codice “più pulito” dichiarando variabili predefinite con un nome differente. Ciò che questo comporta, in realtà, è un raddoppiamento del consumo di memoria dello script. Nell’esempio sottostante, presumiamo che una stringa di esempio contenga dati per 1MB. Copiando la variabile hai portato il consumo di memoria dello script a 2MB.

    <?php
    $about = 'Una stringa molto lunga';    // usa 2MB di memoria
    echo $about;
    
    // contro
    
    echo 'Una stringa molto lunga';        // usa 1MB di memoria

*   [Consigli sulle prestazioni](http://web.archive.org/web/20140625191431/https://developers.google.com/speed/articles/optimizing-php)

[Return to Main Page](http://it.phptherightway.com/)

[![Creative Commons License](Le%20basi%20-%20PHP:%20La%20Retta%20Via_files/88x31.png)](http://creativecommons.org/licenses/by-nc-sa/3.0/)  
PHP: The Right Way di [Josh Lockhart](http://www.twitter.com/codeguy) è rilasciato sotto una licenza [Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License](http://creativecommons.org/licenses/by-nc-sa/3.0/).  
Basato su un lavoro a [www.phptherightway.com](http://www.phptherightway.com/).