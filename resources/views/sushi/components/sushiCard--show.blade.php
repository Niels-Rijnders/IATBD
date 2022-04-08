<article class="sushiCard a-popup">
    <figure class="sushiCard__figure">
        <img class="sushiCard__image" src={{$animal->image}} alt={{$animal->name . " " . $animal->species}} />
    </figure>
    <section class="sushiCard__text">
        <p>{{$animal->description}}</p>
    </section>
    <section class="sushiCard__btnSection">
        <button class="sushiCard__button" onclick="window.location.href='/application'">   Op dit dier passen  </button>
        <a class="sushiCard__back__to__home" href="/sushi"> Back to home </a>
    </section>
</article>