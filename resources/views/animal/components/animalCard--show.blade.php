<article class="animalCard a-popup">
    <figure class="animalCard__figure">
        <img class="animalCard__image" src={{$animal->image}} alt={{$animal->name . " " . $animal->species}} />
    </figure>
    <section class="animalCard__text">
        <p>{{$animal->description}}</p>
    </section>
    <section class="animalCard__btnSection">
        <button class="animalCard__button" onclick="window.location.href='/application'">   Op dit dier passen  </button>
        <a class="animalCard__back__to__home" href="/animal"> Back to home </a>
    </section>
</article>