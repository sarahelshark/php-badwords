<?php
/*Descrizione:
Creare un form PHP che permetta di inviare due campi: un paragrafo ed una parola da censurare.
Gestire il tutto con due file diversi. 
1) Il primo file dovrà permettere all’utente di inserire i dati e inviare la richiesta al server.
   form>input text + $_GET
2) Il secondo file riceverà la richiesta ed eseguirà queste operazioni:
- - stampare a schermo il paragrafo e la sua lunghezza >echo p print +  strlen()   >>if PAROLA NORMALE
- stampare di nuovo il paragrafo e la sua lunghezza, dopo aver sostituito con tre asterischi (***) tutte le occorrenze della parola da censurare  >>if PAROLACCIA: array di parolacce ?
*/
?>
<!doctype html>
<html lang="en">

<head>
    <title>Badwords</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 + fontAwesome-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
$word = strtolower($_GET['name']) ;
//converto la stringa del valore globale in lowercase, così gestisco il caso in cui le parolacce venissero scritte in CAPS LOCK, avendo scritto un array in lower case.

//array di parole vietate
$bad_words = [
    'cazzo','merda','bastardo', 'bastarda', 'puttana', 'troia','baldracca',' battona', 'mignotta', 'zoccola', 'pirla','rincoglionito','rincoglionita','pezzo di merda','bagascia','culo','figa','fottere','stronzo','stronza', 'vaffanculo','incazzarsi','cazzeggio','scazzo','trombare','inculare','sborra', 'sborrare','porco','porca','pisciare','pippa','pugnetta','sega','palle','coglione', 'cogliona','minchia','inculata','fottuto','fottuta','cagare','cacare','ditalino','bocchino','pompino','pompa','soffocotto','fregna','passera','topa','fessa'
];

//divido la sezione di testo che poi vado a censurare
$replace_word = substr($word,1,3);
$censured_word = str_replace($replace_word,"***",$word);

?>
<body class="bg-dark">
    <div class="container mt-3">
        <h1 class="text-white text-center ">Badw*rds detective</h1>
        <form class="p-3" action="" method="get">
         <div class="mb-3 text-white text-center" style="max-width: 50%; margin:auto;" >
            <!--input + submit -->
            <label for="name" class="form-label mb-3">Scrivi una parola e scopri se si tratta di una parolaccia :P </label>           
            <input class="form-control" type="text" name="name" id="name" >

            <button type="submit" class="btn btn-primary mt-3 ">
              Submit
              <i class="fa-regular fa-face-dizzy"></i>
            </button>

            <!--Feedback input-->
            <p class="text-white mt-3 p-3 shadow rounded-top" >
                <?php
                #if la mia parola ha + di 4 caratteri e non è inclusa nel mio array di parolacce:
                     //stampo la parola e la lunghezza
                #else if la mia parola si trova nell'array di parolacce:
                     //stampo la parolaccia formattata
                #else if l'input viene lasciato vuoto
                     //stampo messaggio di allerta
                  if (strlen($word) >= 4 && !in_array($word, $bad_words)) {
                    echo 'la tua parola' .' ' .'"'.$word .'"' .' ' .'&egrave composta da' .' ' .strlen($word) .' ' .'caratteri';
                } else if (in_array($word, $bad_words)){
                    echo $censured_word .' ' .'è una parolaccia';
                }else if (!empty($_GET)){
                 echo "Ops, hai lasciato il form vuoto, inserisci una parola per favore";
                 };
                ?>
            </p>

         </div>
        </form>
    </div>
    

</body>

</html>