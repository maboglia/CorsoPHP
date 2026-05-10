Per visualizzare delle card una alla volta usando PHP (lato server) e JavaScript (lato client), l'approccio più comune consiste nel generare i dati con PHP e gestire lo scorrimento o la visibilità con JavaScript. [1, 2]

## 1. Preparazione Dati con PHP

Invece di creare manualmente ogni card, usa PHP per convertire i tuoi dati (es. da un database) in un array JSON che JavaScript può leggere facilmente. [1]

```php
<?php
// Esempio di dati (possono venire da un database)
$cards = [
    ['title' => 'Card 1', 'content' => 'Contenuto della prima card'],
    ['title' => 'Card 2', 'content' => 'Contenuto della seconda card'],
    ['title' => 'Card 3', 'content' => 'Contenuto della terza card'],
];
?>

<!-- Passiamo i dati a JavaScript -->
<script>
    const cardData = <?php echo json_encode($cards); ?>;
</script>
```

## 2. Struttura HTML

Crea un contenitore dove la card verrà visualizzata e i pulsanti per navigare. [2]

```html
<div id="card-container">
    <div class="card">
        <h2 id="card-title"></h2>
        <p id="card-content"></p>
    </div>
</div>
<button onclick="prevCard()">Precedente</button>
<button onclick="nextCard()">Successiva</button>
```

## 3. Logica JavaScript

Usa un indice per tenere traccia della card corrente e aggiornare il DOM. [2, 3]

```javascript
let currentIndex = 0;
function showCard(index) {
    const title = document.getElementById('card-title');
    const content = document.getElementById('card-content');

    // Aggiorna il contenuto con i dati dell'array PHP
    title.innerText = cardData[index].title;
    content.innerText = cardData[index].content;
}
function nextCard() {
    if (currentIndex < cardData.length - 1) {
        currentIndex++;
        showCard(currentIndex);
    }
}
function prevCard() {
    if (currentIndex > 0) {
        currentIndex--;
        showCard(currentIndex);
    }
}
// Inizializza la prima card
showCard(currentIndex);
```

## Alternative per visualizzare card

* CSS "Display: None": Puoi generare tutte le card con un ciclo foreach in PHP e usare JavaScript per cambiare la proprietà display (da none a block) solo sulla card attiva.
* Expanding Cards: Se vuoi che le card siano tutte visibili ma si espandano "una alla volta" quando cliccate, puoi usare classi CSS come .active gestite tramite classList.toggle() in JavaScript.
* Flipping Cards: Per un effetto "mazzo", puoi applicare rotazioni CSS 3D e mostrare il retro della card al click. [3, 4, 5, 6, 7]



[1] [https://stackoverflow.com](https://stackoverflow.com/questions/53954051/make-foreach-show-one-by-one-within-javascript-loop)
[2] [https://javascript.plainenglish.io](https://javascript.plainenglish.io/javascript-bitesize-card-slider-ee3ab8b179d8)
[3] [https://stackoverflow.com](https://stackoverflow.com/questions/59199215/how-to-display-only-a-few-cards-at-a-time-using-core-javascript)
[4] [https://stackoverflow.com](https://stackoverflow.com/questions/66449563/flipping-all-cards-but-want-to-flip-one-by-one)
[5] [https://www.youtube.com](https://www.youtube.com/watch?v=NaqkIqeqYMI)
[6] [https://stackoverflow.com](https://stackoverflow.com/questions/78158662/why-do-multiple-cards-open-simultaneously-when-clicking-on-a-single-card-in-my-h)
[7] [https://medium.com](https://medium.com/coding-with-carla/build-a-card-that-flips-on-click-with-html-css-and-vanilla-javascript-part-1-937cd2242c90)
[8] [https://stackoverflow.com](https://stackoverflow.com/questions/57436198/displaying-horizontal-cards-then-user-selects-one-click-event-open-another-m)
